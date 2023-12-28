<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Models\Admin;
use App\Notifications\LoginAlert;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends DefaultLoginController
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    protected $redirectTo = RouteServiceProvider::ADMINHOME;

    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 30; // Default is 1

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials, $request->get('remember'))) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->withErrors(['err_msg' => 'Opps! You have entered invalid credentials']);
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('admin.login');
    }
    
    /*public function username()
    {
        return 'username';
    }
    
    protected function guard()
    {
        return Auth::guard('admin');
    }*/
}
