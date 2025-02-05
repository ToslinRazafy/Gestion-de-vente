<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        Auth::logout();
        return view("auth.login");
    }

    public function doLogin(LoginRequest $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->role == "Admin"){
                return to_route('admin.dashboard');
            }
            return redirect()->intended(route("vente.show"));
        }
        return to_route("auth.login");
    }

    public function logout(){
        Auth::logout();
        return to_route("auth.login");
    }
}
