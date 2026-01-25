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
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        if (empty($username) || empty($email) || empty($password)) {
            return response()->json(['message' => 'All fields are required'], 400);
        }

        $usercorrect = "Nguyen Hoang Viet";
        $emailcorrect = "0292767@st.huce.edu.vn";

        if ($username !== $usercorrect || $email !== $emailcorrect) {
            return response()->json(['message' => 'Username or email is incorrect'], 400);
        }

        if ($username === $usercorrect && $email === $emailcorrect) {
            return response()->json(['message' => 'Registration successful'], 201);
        }
    }
}
