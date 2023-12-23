<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return $request->session()->regenerate();
        }

        return response()->json([
            'message' => 'Данные не верны',
            'errors' => [
                'email' => 'Email или пароль введены неверно',
            ],
        ], 422);
    }

}
