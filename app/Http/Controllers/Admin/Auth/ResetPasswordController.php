<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Auth\ResetPasswordController as DefaultResetPasswordController;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends DefaultResetPasswordController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMINHOME;

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showResetForm($token)
    {
        return view('admin.auth.passwords.reset', ['token' => $token]);
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    /*public function reset(Request $request)
    {dd('/');
        $request->validate($request, [
            'email' => ['required', 'email', 'exists:admins'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirmation' => ['required']
        ]);
        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        Admin::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect()->route('admin.login')->with('success', 'Your password has been changed!');
    }*/
}
