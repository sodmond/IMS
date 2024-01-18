<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $invoices = Invoice::where('id', $search)->paginate(10);
            return view('admin.invoices', compact('invoices', 'search'));
        }
        $invoices = Invoice::orderByDesc('created_at')->paginate(10);
        return view('admin.invoices', compact('invoices'));
    }

    public function get($id)
    {
        $invoice = Invoice::find($id);
        return view('admin.invoice', compact('invoice'));
    }

    public function generate($orderId)
    {
        //
    }
}
