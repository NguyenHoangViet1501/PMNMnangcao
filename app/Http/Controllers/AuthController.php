<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function checkLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'vietnh' && $password === '123') {
            return response()->json(['message' => 'Login successful'], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    public function checkRegister(Request $request)
    {
        $data = $request->all();
        if ($data['password'] !== $data['repassword']) {
            return response()->json(['message' => 'Password confirmation does not match'], 400);
        }
        else if ($data['username']=== 'vietnh' && $data['mssv'] ==='0292767' && $data['lopmonhoc'] ==='67PM1' && $data['gioitinh'] ==='nam') {
            return response()->json(['message' => 'Register successful'], 200);
        } else {
            return response()->json(['message' => 'Register failed'], 400);
        }
    }
}
