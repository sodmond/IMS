<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'title', 'part_number', 'description', 'price', 'old_price', 'quantity', 'prev_qty'];
}
