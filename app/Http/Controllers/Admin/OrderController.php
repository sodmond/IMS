<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('admin.order', compact('order', 'products'));
    }
}
