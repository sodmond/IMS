<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public $cookieId;

    public function __construct()
    {
        $this->cookieId = 'cybernaultng_'.session()->getId();
    }

    public function index()
    {
        $cookieId = 'cybernaultng_'.session()->getId();
        $cart = Cart::where('cookie_id', $cookieId)->get();
        $products = Product::all()->keyBy('id'); #dd($products);
        return view('cart', compact('cart', 'products'));
    }

    public function addToCart(Request $request)
    {
        #dd(session()->getId());
        $this->validate($request, [
            'product_id' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1'],
        ]); #dd($request->all());
        $quantity = $request->quantity;
        $cookieId = 'cybernaultng_'.session()->getId();
        $cartItem = DB::table('carts')->where('cookie_id', $cookieId)->where('product_id', $request->product_id);
        if ($cartItem->first()) {
            $cartItem->increment('quantity', $quantity);
            return back()->with('cart_suc', 'Product has been added to cart');
        }
        $cart = new Cart();
        $cart->cookie_id = $cookieId;
        $cart->product_id = $request->product_id;
        $cart->quantity = $quantity;
        $cart->save();
        return back()->with('cart_suc', 'Product has been added to cart');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'product_ids' => ['required', 'array'],
            'product_ids.*' => ['required', 'numeric'],
            'quantities' => ['required', 'array'],
            'quantities.*' => ['required', 'numeric', 'min:1'],
        ]);
        $cookieId = 'cybernaultng_'.session()->getId();
        Cart::where('cookie_id', $cookieId)->whereIn('product_id', $request->product_ids)->lazyById()->each(function ($task) use ($request) {
            $productIndex = array_search($task->product_id, $request->product_ids);
            if ($task->quantity != $request->quantities[$productIndex]) {
                $cart = Cart::find($task->id);
                $cart->quantity = $request->quantities[$productIndex];
                $cart->save();
            }
        });
        return redirect()->route('checkout');
    }

    public function removeItem($id)
    {
        $cookieId = 'cybernaultng_'.session()->getId();
        $cart = Cart::where('cookie_id', $cookieId)->where('product_id', $id)->first();
        $cart->delete();
        return back();
    }

    public function checkout()
    {
        $cookieId = 'cybernaultng_'.session()->getId();
        $cart = Cart::where('cookie_id', $cookieId)->get();
        if ($cart->count() < 1) {
            return redirect()->route('cart');
        }
        $products = Product::all()->keyBy('id'); #dd($products);
        return view('checkout', compact('cart', 'products'));
    }

    public function submitQuote(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'companyname' => ['nullable', 'max:255'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'numeric'],
            'billing_firstname' => ['required', 'max:255'],
            'billing_lastname' => ['required', 'max:255'],
            'billing_companyname' => ['nullable', 'max:255'],
            'billing_address' => ['required', 'max:255'],
            'billing_phone' => ['required', 'numeric'],
            'shipping_firstname' => ['nullable', 'max:255'],
            'shipping_lastname' => ['nullable', 'max:255'],
            'shipping_companyname' => ['nullable', 'max:255'],
            'shipping_address' => ['nullable', 'max:255'],
            'shipping_phone' => ['nullable', 'numeric'],
        ]);
        $user = User::where('email', $request->email)->first();
        $cookieId = 'cybernaultng_'.session()->getId();
        $cartItems = Cart::where('cookie_id', $cookieId)->pluck('product_id');
        $cartItemsQty = Cart::where('cookie_id', $cookieId)->pluck('quantity');
        #dd(json_encode($cartItemsQty));
        DB::beginTransaction();
        try {
            if (! $user) {
                $user = User::create([
                    'email' => $request->email,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'companyname' => $request->companyname,
                    'phone' => $request->phone,
                    'password' => Str::random(),
                ]);
            } else {
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->companyname = $request->companyname;
                $user->phone = $request->phone;
                $user->save();
            }
            $order = Order::create([
                'id' => Order::createOrderId(), 
                'user_id' => $user->id,
                'products' => json_encode($cartItems),
                'quantity' => json_encode($cartItemsQty),
                'comment' => $request->comment,
            ]);
            DB::table('order_address')->insert([
                'order_id' => $order->id,
                'billing_firstname' => $request->billing_lastname,
                'billing_lastname' => $request->billing_lastname,
                'billing_company' => $request->billing_companyname,
                'billing_address' => $request->billing_address,
                'billing_phone' => $request->billing_phone,
                'shipping_firstname' => $request->shipping_firstname ?? $request->billing_lastname,
                'shipping_lastname' => $request->shipping_lastname ?? $request->billing_lastname,
                'shipping_company' => $request->shipping_companyname ?? $request->billing_companyname,
                'shipping_address' => $request->shipping_address ?? $request->billing_address,
                'shipping_phone' => $request->shipping_phone ?? $request->billing_phone,
            ]);
            Cart::where('cookie_id', $cookieId)->delete();
            DB::commit();
            return redirect()->route('cart')->with('success', 'Your quote has been submitted, we will get in touch with you soon.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered while submitting quote']);
        }
    }
}
