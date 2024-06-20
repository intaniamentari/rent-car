<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('landing_page.signin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role == 'customer') {
                return redirect()->route('vehicles.index');
            }
        } else {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
