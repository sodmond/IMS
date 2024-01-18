<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = ['id', 'user_id', 'products', 'status', 'comment'];

    public static function createOrderId()
    {
        $orderId = 'IMS' . time();
        return $orderId;
    }
}
