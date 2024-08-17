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
    public function index($filter) {
        if ($filter == 'all') {
            $users = User::orderByDesc('created_at')->paginate(15);
            return view('admin.users', compact('users', 'filter'));
        }
        $users = User::where('email', 'LIKE', "%$filter%")->orWhere('firstname', 'LIKE', "%$filter%")
                    ->orWhere('lastname', 'LIKE', "%$filter%")->paginate(15);
        return view('admin.users', compact('users', 'filter'));
    }

    public function get($id) {
        $user = User::find($id);
        if ($user) {
            $orders = Order::where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
            return view('admin.user', compact('user', 'orders'));
        }
        return redirect()->route('admin.home');
    }

    public function orders($id)
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $id)->orderBydesc('created_at')->paginate(15);
        return view('admin.orders', compact('user', 'orders'));
    }

    public function search()
    {
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            return redirect()->route('admin.users', ['filter'=> $search]);
        }
        return redirect()->route('admin.users', ['filter' => 'all']);
    }
}
