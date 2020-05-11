<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class MitraLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return auth()->guard('mitra');
    }

    public function showLoginForm()
    {
        return view('home');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->flush();

        // $request->session()->regenerate();

        return redirect('mitra');
    }

}
