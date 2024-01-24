<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return view('products', compact('products'));
    }

    public function get($id, $slug)
    {
        $product = Product::find($id);
        $category = DB::table('product_categories')->find($product->category_id);
        $related_products = Product::where('category_id', $category->id)->take('6')->get();
        return view('product_details', compact('product', 'category', 'related_products'));
    }

    
}
