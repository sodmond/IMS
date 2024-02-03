<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendInvoice;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $orders = Order::where('id', $search)->paginate(10);
            return view('admin.orders', compact('orders', 'search'));
        }
        $orders = Order::orderByDesc('created_at')->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function get($id)
    {
        $order = Order::find($id);
        $products = Product::whereIn('id', json_decode($order->products, true))->paginate(10);
        $allProducts = Product::whereNotIn('id', json_decode($order->products, true))->get();
        $invoice = Invoice::where('order_id', $order->id)->first();
        return view('admin.order', compact('order', 'products', 'allProducts', 'invoice'));
    }

    public function addProduct($orderId, Request $request)
    {
        $this->validate($request, [
            'product_id' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1']
        ]);
        DB::beginTransaction();
        try {
            $order = Order::find($orderId);
            $products = json_decode($order->products, true);
            $quantities = json_decode($order->quantity, true);
            array_push($products, $request->product_id);
            array_push($quantities, $request->quantity);
            $order->products = json_encode($products);
            $order->quantity = json_encode($quantities);
            $order->save();
            DB::commit();
            return back()->with('success', 'Product has been added to order');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered while adding new product, pls try again.']);
        }
    }

    public function editProduct($orderId, Request $request)
    {
        $this->validate($request, [
            'product_id' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric']
        ]);
        DB::beginTransaction();
        try {
            $order = Order::find($orderId);
            $products = json_decode($order->products, true);
            $quantities = json_decode($order->quantity, true);
            $index = array_search($request->product_id, $products);
            $quantities[$index] = $request->quantity;
            $order->products = json_encode($products);
            $order->quantity = json_encode($quantities);
            $order->save();
            DB::commit();
            return back()->with('success', 'Quantity of selected product has been updated');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered while updating product quantity, pls try again.']);
        }
    }

    public function removeProduct($orderId, Request $request)
    {
        $this->validate($request, [
            'product_id' => ['required', 'numeric']
        ]);
        DB::beginTransaction();
        try {
            $order = Order::find($orderId);
            $products = json_decode($order->products, true);
            $quantities = json_decode($order->quantity, true);
            $index = array_search($request->product_id, $products);
            unset($products[$index]);
            unset($quantities[$index]);
            $order->products = json_encode($products);
            $order->quantity = json_encode($quantities);
            $order->save();
            DB::commit();
            return back()->with('success', 'Product has been removed from order');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered while removing product from order, pls try again.']);
        }
    }

    public function genInv($orderId, Request $request)
    {
        $this->validate($request, [
            'shipping_fee' => ['required', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'tax' => ['nullable', 'numeric'],
            'lead_time' => ['nullable', 'max:255'],
            'note' => ['nullable', 'max:255'],
        ]);
        $order = Order::find($orderId);
        $customer = User::find($order->user_id);
        $orderAddr = DB::table('order_address')->where('order_id', $order->id)->first();
        $cost_per_each = [];
        $product_ids = json_decode($order->products, true);
        $quantities = json_decode($order->quantity, true);
        $products = Product::whereIn('id', $product_ids)->get();
        for($i=0; $i < count($product_ids); $i++) {
            $cost_per_each[] = round($products[$i]->price * $quantities[$i], 2);
        }
        $subTotal = array_sum($cost_per_each);
        $discount = ($subTotal * $request->discount) / 100;
        $tax = ($subTotal * $request->tax) / 100;
        $total_cost = ($subTotal - $discount) + ($request->shipping_fee + $tax);
        $invoice = Invoice::where('order_id', $orderId)->first();
        if ($invoice) {
            $invoice->cost_per_each = json_encode($cost_per_each);
            $invoice->total_cost = $total_cost;
            $invoice->shipping_fee = $request->shipping_fee;
            $invoice->discount = $request->discount;
            $invoice->tax = $request->tax;
            $invoice->lead_times = $request->lead_time;
            $invoice->note = $request->note;
            $invoice->save();
            $pdf = Pdf::loadView('admin.invoice_temp', compact('order', 'orderAddr', 'invoice', 'products', 'product_ids', 'quantities'));
            $pdfFileName = $invoice->id . '.pdf';
            $pdf->save(storage_path()."/app/public/invoices/$pdfFileName");
            Mail::to($customer->email)->send(new SendInvoice($invoice->id));
            return back()->with('success', 'Invoice has been updated and sent to client');
        }
        $invoice = new Invoice;
        $invoice->id = Invoice::genId();
        $invoice->order_id = $order->id;
        $invoice->cost_per_each = json_encode($cost_per_each);
        $invoice->total_cost = $total_cost;
        $invoice->shipping_fee = $request->shipping_fee;
        $invoice->discount = $request->discount;
        $invoice->tax = $request->tax;
        $invoice->lead_times = $request->lead_time;
        $invoice->note = $request->note;
        $invoice->save();
        $pdf = Pdf::loadView('admin.invoice_temp', compact('order', 'orderAddr', 'invoice', 'products', 'product_ids', 'quantities'));
        $pdfFileName = $invoice->id . '.pdf';
        $pdf->save(storage_path()."/app/public/invoices/$pdfFileName");
        Mail::to($customer->email)->send(new SendInvoice($invoice->id));
        return back()->with('success', 'Invoice has been generated and sent to client');
    }

    public function delete($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->delete();
            return redirect()->route('admin.orders')->with('success', 'The selected order has been deleted');
        }
        return redirect()->route('admin.orders')->withErrors(['err_msg' => '']);
    }
}
