<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['category_id', 'title', 'part_number', 'description', 'price', 'old_price', 'quantity', 'prev_qty', 'image'];

    public static function getProductCatName($catId)
    {
        $category = DB::table('product_categories')->find($catId);
        return $category->title;
    }
}
