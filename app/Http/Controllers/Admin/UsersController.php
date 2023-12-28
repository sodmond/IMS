<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessCode;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function index() {
        $users = User::paginate(15);
        return view('backend.users', compact('users'));
    }

    public function view($id) {
        $user = User::find($id);
        if ($user) {
            $accessCodes = AccessCode::where('user_id', $user->id)->orderByDesc('created_at')->take(10)->get();
            $orders = Order::where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
            return view('backend.user', compact('user', 'orders', 'accessCodes'));
        }
        return redirect()->route('admin.home');
    }
    
    public function search() {
        if (! isset($_GET['search'])) {
            redirect()->route('admin.users');
        }
        $val = $_GET['search'];
        $users = User::where('email', 'LIKE', "%$val%")->take(10)->paginate(10);
        return view('backend.users', compact('users'));
    }

    public function orders($id)
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $id)->orderBydesc('created_at')->paginate(15);
        return view('backend.orders', compact('user', 'orders'));
    }

    public function accessCodes($id) : View 
    {
        $user = User::find($id);
        $accessCodes = AccessCode::where('user_id', $id)->orderByDesc('created_at')->paginate(10);
        return view('backend.access_codes', compact('user', 'accessCodes'));
    }
}
