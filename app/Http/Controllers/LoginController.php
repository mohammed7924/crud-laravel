<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function dologin(Request $request){
       $credentials = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
       ]);

    //    if(Auth::attempt($credentials,true)){
        return redirect()->route('home');
    //        }
    //    else{

// return redirect()->route(('login'))->with('message','Invalid email or password');

       }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
