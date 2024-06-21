<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
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
                return redirect()->route('rentcar-info.index');
            } elseif ($user->role == 'customer') {
                return redirect()->route('carbook.index');
            }
        } else {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function signup()
    {
        return view('landing_page.signup');
    }

    public function createAccount(CustomerRequest $request)
    {
        $data = $request->all();

        $data = $request->validated(); // Mengambil data validasi

        // Buat user baru
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'customer'
        ]);

        // Buat admin baru dan kaitkan dengan user yang baru dibuat
        Customer::create([
            'user_id' => $user->id,
            'phone' => $data['phone'],
            'name' => $data['name'],
            'address' => $data['address'],
            'sim_card' => $data['sim_card']
        ]);

        return redirect()->route('login')->with('success', 'Customer berhasil ditambahkan.');

    }
}
