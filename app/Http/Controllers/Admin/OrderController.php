<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        return view('admin.order', compact('order', 'products', 'allProducts'));
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

    public function genInv($orderId)
    {}

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
