<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show()
    {
        return view('login_form');
    }

    public function login(Request $request)
    {
        validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ])->validate();

        if (
            auth()->attempt($request->only([
                'email',
                'password'
            ]))
        ) {
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Cred']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function dashboard()
    {
        return view('welcome', [
            'user' => auth()->user()
        ]);
    }

    public function loginPassport(Request $request)
    {
        auth()->attempt($request->all());
        $user = auth()->user();

        $token = $user->createToken('frodea')->accessToken;
        $json = [
            'token' => $token,
        ];

        return response($json, 200);
    }

    public function logoutPassport()
    {
        $accessToken = auth()->guard('api')->user()->token();
        $accessToken->revoke();
        $json = ['msg' => 'Logout Successful'];
        return response($json, 200);
    }

    public function userData()
    {
        return response(['user' => auth()->guard('api')->user()], 200);
    }
}
