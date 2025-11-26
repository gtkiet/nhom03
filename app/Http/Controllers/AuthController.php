<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'mat_khau' => $request->password
        ];

        // Laravel login với custom password field
        $user = NguoiDung::where('email', $request->email)->first();

        if ($user && $request->password === $user->mat_khau) {
            Auth::login($user);
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Sai email hoặc mật khẩu']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
