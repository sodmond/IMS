<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsletterExport;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\Quote;
use App\Models\User;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function home()
    {
        #dd('Worked');
        return redirect()->route('admin.home');
    }

    public function index()
    {
        $users = User::all();
        $products = Product::all();
        $productsOutOfStock = Product::where('quantity', '<=', 10)->get();
        $orders = Order::all();
        $ordersCompleted = Order::where('status', 'completed')->get();
        $recentOrders = Order::orderByDesc('created_at')->take(10)->get();
        $invoiceTotal = Invoice::whereIn('order_id', $ordersCompleted->pluck('id'))->sum('total_cost'); #dd($ordersCompleted->pluck('id'));
        return view('admin.home', compact('users', 'products', 'productsOutOfStock', 'orders', 'ordersCompleted', 'recentOrders', 'invoiceTotal'));
    }

    public function reports($type)
    {
        $filter = $_GET['filter'] ?? date('Y-m-d');
        if ($type == 'daily') {
            $users = User::where(DB::raw('DATE(created_at)'), $filter)->get();
            $products = Product::where(DB::raw('DATE(created_at)'), $filter)->get();
            $orders = Order::where(DB::raw('DATE(created_at)'), $filter)->get();
            $ordersCompleted = Order::where(DB::raw('DATE(created_at)'), $filter)->where('status', 'completed')->get();
            $invoiceTotal = Invoice::whereIn('order_id', $ordersCompleted->pluck('id'))->sum('total_cost'); #dd($ordersCompleted->pluck('id'));
            return view('admin.reports', compact('type', 'users', 'products', 'orders', 'ordersCompleted', 'invoiceTotal'));
        }
        if ($type == 'weekly') {
            $users = User::whereRaw("WEEK(created_at) = WEEK('$filter')")->get();
            $products = Product::whereRaw("WEEK(created_at) = WEEK('$filter')")->get();
            $orders = Order::whereRaw("WEEK(created_at) = WEEK('$filter')")->get();
            $ordersCompleted = Order::whereRaw("WEEK(created_at)= WEEK('$filter')")->where('status', 'completed')->get();
            $invoiceTotal = Invoice::whereIn('order_id', $ordersCompleted->pluck('id'))->sum('total_cost'); #dd($ordersCompleted->pluck('id'));
            return view('admin.reports', compact('type', 'users', 'products', 'orders', 'ordersCompleted', 'invoiceTotal'));
        }
        if ($type == 'monthly') {
            $users = User::whereRaw("MONTH(created_at) = MONTH('$filter')")->get();
            $products = Product::whereRaw("MONTH(created_at) = MONTH('$filter')")->get();
            $orders = Order::whereRaw("MONTH(created_at) = MONTH('$filter')")->get();
            $ordersCompleted = Order::whereRaw("MONTH(created_at)= MONTH('$filter')")->where('status', 'completed')->get();
            $invoiceTotal = Invoice::whereIn('order_id', $ordersCompleted->pluck('id'))->sum('total_cost'); #dd($ordersCompleted->pluck('id'));
            return view('admin.reports', compact('type', 'users', 'products', 'orders', 'ordersCompleted', 'invoiceTotal'));
        }
        return view('admin.reports', compact('type'));
    }

    public function reportsFilter()
    {
        if (isset($_GET['type']) && isset($_GET['filter'])) {
            $type = $_GET['type'];
            $filter = $_GET['filter'];
            return redirect()->route('admin.reports', ['type' => $type, 'filter' => $filter]);
        }
        return redirect()->route('admin.home');
    }

    public function newsletter()
    {
        $emails = DB::table('newsletter')->paginate(10);
        return view('backend.newsletter', compact('emails'));
    }

    public function getUserFullName($email) : JsonResponse
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            $fullName = $user->firstname .' '. $user->lastname;
            return response()->json(['fullname' => $fullName, 'user_id' => $user->id]);
        }
        return response()->json(['error' => 'User Not found!']);
    }

    public function exportNewsletterSub()
    {
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $fileName = $monthName.$year.'.xlsx';
            return Excel::download(new NewsletterExport($month, $year), $fileName);
        }
        return redirect()->back();
    }
}
