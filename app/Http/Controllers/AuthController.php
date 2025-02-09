<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.index');
    }

    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->with('danger', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.index');
    }
}
