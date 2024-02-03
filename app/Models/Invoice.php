<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $incrementing = false;

    public static function genId()
    {
        $invoiceId = 'INV_' . time();
        return $invoiceId;
    }
}
