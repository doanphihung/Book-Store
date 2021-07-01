<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showFormLogin()
    {
        return view('form-login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($data)) {
            Toastr::success('Welcome ' . Auth::user()->name . '!');
           return redirect()->route('store.homepage');
        }
        session()->flash('login-error', 'Tài khoản hoặc mật khẩu không chính xác');
        return redirect()->route('login.showFormLogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.showFormLogin');
    }
}
