<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Notifications\StockAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $invoices = Invoice::where('id', $search)->paginate(10);
            return view('admin.invoices', compact('invoices', 'search'));
        }
        $invoices = Invoice::orderByDesc('created_at')->paginate(10);
        return view('admin.invoices', compact('invoices'));
    }

    public function get($id)
    {
        $invoice = Invoice::find($id);
        $payment = Payment::where('invoice_id', $invoice->id)->first();
        return view('admin.invoice', compact('invoice', 'payment'));
    }

    public function addPayment($invoice_id, Request $request)
    {
        $this->validate($request, [
            'amount' => ['required', 'numeric'],
            'reference' => ['required', 'max:255'],
            'proof' => ['required', 'mimes:pdf,jpg,png,jpeg,bmp', 'max:1024'],
            'memo' => ['nullable', 'max:255'],
        ]);
        DB::beginTransaction();
        $invoice = Invoice::find($invoice_id);
        $proofPath = $request->file('proof')->store('payments', 'public');
        $payment = new Payment();
        $payment->invoice_id = $invoice_id;
        $payment->amount = $request->amount;
        $payment->reference = $request->reference;
        $payment->proof = $proofPath;
        $payment->memo = $request->memo;
        $invoice->status = true;
        $order = Order::find($invoice->order_id);
        $order->status = 'completed';
        $products = json_decode($order->products, true);
        $quantities = json_decode($order->quantity, true);
        $lowStockCount = 0;
        Product::whereIn('id', $products)->lazyById()->each(function($task) use($products, $quantities, &$lowStockCount){
            $index = array_search($task->id, $products);
            $product = Product::find($task->id);
            if ($product->quantity < $quantities[$index]) {
                return back()->withErrors(['err_msg' => 'A product in the order is out of stock']);
            }
            $product->quantity -= $quantities[$index];
            $product->save();
            if ($product->quantity <= 10) {
                $lowStockCount++;
            }
        });
        if($payment->save() && $invoice->save() && $order->save()) {
            DB::commit();
            if($lowStockCount > 0) {
                $admin = Admin::find(1);
                $admin->notify(new StockAlert($lowStockCount));
            }
            return back()->with('success', 'Payment has been added to Invoice');
        }
        DB::rollBack();
        return back()->withErrors(['err_msg' => 'Problem encountered while adding payment to Invoice, please try again.']);
    }
}
