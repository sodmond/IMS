<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsletterExport;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
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
        return view('admin.home', compact('users', 'products'));
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
