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
        #$settings = DB::table('settings')->first();
        return view('admin.settings', compact('adminRoles', 'admins'));
    }

    public function newProductCat(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:500'],
        ]);
        DB::beginTransaction();
        try {
            DB::table('product_categories')->insert(
                array_merge($request->except('_token'), [
                    'created_at' => now()
                ])
            );
            DB::commit();
            return back()->with('success', 'Fees has been updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('New Product Categories: ' . $e->getMessage());
            return back()->withErrors(['update_err' => 'Error adding new product categories, pls try again.']);
        }
    }

    public function newAdmin(Request $request)
    {
        if (auth('admin')->user()->role != 1) {
            return redirect()->route('backend.settings');
        }
        if (! isset($request->_token)) {
            $roles = DB::table('admin_roles')->get();
            return view('admin.auth.register', compact('roles'));
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

    public function suspendAdmin($id)
    {
        $admin = User::find($id);
        if ((Auth::id() != 1 && $admin->role != 3) || (Auth::id() == $admin->id)) {
            return redirect()->back();
        }
        if ($admin->status == true) {
            $admin->status = false;
            $admin->save();
            return back()->with('success', 'Admin member has been suspended');
        }
        $admin->status = true;
        $admin->save();
        return back()->with('success', 'Suspension has been lifted for the specified admin member');
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
}
