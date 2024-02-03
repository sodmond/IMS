<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index($filter)
    {
        if ($filter == 'all') {
            $products = Product::orderByDesc('created_at')->paginate(10);
            return view('admin.products', compact('products', 'filter'));
        }
        if ($filter == 'low_stock') {
            $products = Product::where('quantity', '<=', 10)->orderByDesc('created_at')->paginate(10);
            $filter = str_replace('_', ' ', $filter);
            return view('admin.products', compact('products', 'filter'));
        }
        $products = Product::where('title', 'LIKE', "%$filter%")->orderByDesc('created_at')->paginate(10);
        return view('admin.products', compact('products', 'filter'));
    }

    public function search()
    {
        $filter = $_GET['search'];
        return redirect()->route('admin.products', ['filter' => $filter]);
    }

    public function new()
    {
        $categories = DB::table('product_categories')->get();
        return view('admin.product_new', compact('categories'));
    }

    public function saveNew(Request $request)
    {
        $this->validate($request, [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'max:255'],
            'part_number' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,bmp'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ],[
            'category_id.integer' => 'Invalid category selected'
        ]);
        DB::beginTransaction();
        try {
            $imgPath = $request->file('image')->store('products', 'public');
            Product::create(
                array_merge($request->except(['_token', 'image']), [
                    'image' => $imgPath,
                ])
            );
            DB::commit();
            return back()->with('success', 'New product has been added');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered while adding new product.']);
        }
    }

    public function get($id)
    {
        $product = Product::find($id);
        return view('admin.product', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = DB::table('product_categories')->get();
        return view('admin.product_edit', compact('product', 'categories'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'max:255'],
            'part_number' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,bmp'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ],[
            'category_id.integer' => 'Invalid category selected'
        ]);
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            $product->category_id = $request->category_id;
            $product->title = $request->title;
            $product->part_number = $request->part_number;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            if (!empty($request->image)) {
                Storage::delete('public/'.$product->image);
                $imgPath = $request->file('image')->store('products', 'public');
                $product->image = $imgPath;
            }
            $product->save();
            DB::commit();
            return back()->with('success', 'Product has been updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered while updating product, pls try again']);
        }
    }
}
