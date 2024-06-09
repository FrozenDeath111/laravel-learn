<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index($id)
    {
        $student = Student::find($id);

        return view('student.dashboard', [
            'student' => $student,
        ]);
    }
    public function loginForm()
    {
        return view('student.login');
    }

    public function registerForm()
    {
        return view('student.register');
    }

    public function login(Request $request)
    {
        if (Auth::guard('student')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::guard('student')->user();
            $request->session()->regenerate();
            return redirect('/student/' . $user->id);
        }
        return redirect('/student/login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'unique:students'],
            'password' => ['required'],
        ]);

        $student = new Student();

        $student->username = $request->username;
        $student->password = Hash::make($request->password);

        try {
            $student->save();
            if (Auth::guard('student')->attempt(['username' => $student->username, 'password' => $student->password])) {
                $request->session()->regenerate();
                return redirect('/student/' . $student->id);
            }
            return redirect('/');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}
