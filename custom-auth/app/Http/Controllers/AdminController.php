<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return redirect('/admin/dashboard');
    }

    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', [
            'admin' => $admin,
        ]);
    }

    public function loginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // $request->password = Hash::make($request->password);
        $setToken = $request->username . $request->password;

        $admin = Admin::where('username', $request->username)->first();
        $tokenVerify = Hash::check($setToken, $admin->token);

        if ($tokenVerify) {
            Auth::guard('admin')->loginUsingId($admin->id);
            return redirect('/admin/dashboard');
        }

        // if (Auth::guard('admin')->attempt(['token' => Hash::make($setToken)])) {
        //     return redirect('/admin/dashboard');
        // }

        return redirect('/admin/login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'unique:admins'],
            'password' => ['required'],
        ]);

        $admin = new Admin();

        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->token = Hash::make($request->username . $request->password);

        $admin->save();

        return response()->json(['msg' => 'Done']);
    }

    public function logot(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }
}
