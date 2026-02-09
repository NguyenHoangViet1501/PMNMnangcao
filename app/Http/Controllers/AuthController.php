<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('name', $credentials['username'])->orWhere('email', $credentials['username'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Đăng nhập thành công, lưu session hoặc auth tuỳ ý
            session(['user_id' => $user->id]);
            return response()->json(['message' => 'Login successful'], 200);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function checkRegister(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'mssv' => 'required',
            'lopmonhoc' => 'required',
            'gioitinh' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ]);
        // Check if user exists
        if (User::where('name', $data['username'])->orWhere('email', $data['mssv'])->exists()) {
            return response()->json(['message' => 'User already exists'], 400);
        }
        // Create user
        $user = User::create([
            'name' => $data['username'],
            'email' => $data['mssv'], // tạm dùng mssv làm email
            'password' => Hash::make($data['password']),
        ]);
        return response()->json(['message' => 'Register successful'], 200);
    }
}
