<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(): \Illuminate\View\View
    {
        return view('login');
    }

    public function dologin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

            return redirect()->route('home');

    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
