<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/admin');
        }

        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return route('admin.news.index');
        }

        return response()->json([
            'message' => 'Данные не верны',
            'errors' => [
                'email' => 'Email или пароль введены неверно',
            ],
        ], 422);
    }
}
