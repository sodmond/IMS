<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Mail\SendAccessCode;
use App\Models\AccessCode;
use App\Models\Admin;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        $adminRoles = DB::table('admin_roles')->get();
        $admins = Admin::all();
        $settings = DB::table('settings')->first();
        return view('backend.settings', compact('adminRoles', 'admins', 'settings'));
    }

    public function updateFees(Request $request)
    {
        $this->validate($request, [
            'broker_fee' => ['required', 'numeric'],
            'agent_fee' => ['required', 'numeric'],
        ]);
        DB::beginTransaction();
        try {
            DB::table('settings')->update($request->except('_token'));
            DB::commit();
            return back()->with('success', 'Fees has been updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('Update Fees: ' . $e->getMessage());
            return back()->withErrors(['update_err' => 'Error updating fees, pls try again.']);
        }
    }

    public function newAdmin(Request $request)
    {
        if (auth('admin')->user()->role != 1) {
            return redirect()->route('backend.settings');
        }
        $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:admins'],
            'role' => ['required', 'integer'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ]);
        $admin = new Admin;
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return back()->with('success', 'New administrator has been added.');
    }

    public function deleteAdmin($id)
    {
        if ($id == 1 || $id == auth('admin')->id() || auth('admin')->user()->role != 1) {
            return back()->withErrors(['adm_err' => 'Administrator cannot be deleted']);
        }
        $admin = Admin::find($id);
        $admin->delete();
        return back()->with('success', 'Administrator has been deleted');
    }

    public function accessCodes() : View 
    {
        $accessCodes = AccessCode::orderByDesc('created_at')->paginate(10);
        return view('backend.access_codes', compact('accessCodes'));
    }

    public function newAccessCodes(Request $request) 
    {
        if (! isset($request->_token)) {
            return view('backend.access_code_new');
        }
        $this->validate($request, [
            'user_id' => ['required', 'integer'],
            'amount' => ['required', 'numeric'],
        ]);
        $user = User::find($request->user_id);
        DB::beginTransaction();
        try {
            $payment = new Payment();
            $payment->user_id = $request->user_id;
            $payment->amount = $request->amount;
            $payment->reference = 'TRS_'.Str::random(10);
            $payment->memo = 'Manual Payment';
            $payment->save();
            $accessCode = new AccessCode();
            $accessCode->user_id = $request->user_id;
            $accessCode->code = strtoupper(Str::random(6) .'-'. rand(10000, 999999) .'-'. Str::random(6));
            $accessCode->payment_id = $payment->id;
            $accessCode->save();
            DB::commit();
            Mail::to($user->email)->queue(new SendAccessCode($accessCode->code));
            return back()->with('success', 'Access code has been generated and sent to assigned user.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('New Access Code' . $e->getMessage());
            return back()->withErrors(['err_msg' => 'Unable to generate access code, pls try again.']);
        }
    }

    public function accessCodeUpdate($id, $type)
    {
        $accessCode = AccessCode::find($id);
        if ($accessCode->status == 'unused' && $type == 'disable') {
            $accessCode->status = 'disabled';
            $accessCode->save();
            return back()->with('success', 'Selected Access Code has been disabled.');
        }
        if ($accessCode->status == 'disabled' && $type == 'enable') {
            $accessCode->status = 'unused';
            $accessCode->save();
            return back()->with('success', 'Selected Access Code has been enabled.');
        }
        return back()->withErrors(['update_err' => 'Problem encountered, pls try again or contact webmaster if issue persist']);
    }
}
