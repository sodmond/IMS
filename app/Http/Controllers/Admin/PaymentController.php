<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderByDesc('created_at')->paginate(10);
        return view('admin.payments', compact('payments'));
    }

    public function get($id)
    {
        $payment = Payment::find($id);
        return view('admin.payment', compact('payment'));
    }
}
