<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    public function index(){
        return view("welcome");
    }

    public function login(){
        return view('login');
    }

    public function login_check(Request $request){
        session()->put('username', $request->username);
        $all = session()->all();
        $value = session()->get('username');
        return view('welcome', [
            'value'=> $value,
            'all'=> $all,
        ]);
    }

    public function logout(){
        session()->forget('username');
        session()->flush();
        return view('welcome');
    }
}
