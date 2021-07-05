<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\FormLoginRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{

    public function showFormLogin()
    {
        if (Auth::user()) {
            Toastr::success('Login', 'Bạn đã đăng nhập');
            return back();
        }
        return view('form-login');
    }

    public function login(FormLoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($data)) {
            if (Gate::allows('can-view-DashBoard', Auth::user())) {
                Toastr::success('Welcome ' . Auth::user()->name . '!');
                return redirect()->route('admin.dashboard');
            } else {
                Toastr::success('Welcome ' . Auth::user()->name . '!');
                return redirect()->route('store.homepage');
            }
        }
        session()->flash('login-error', 'Tài khoản hoặc mật khẩu không chính xác!');
        return redirect()->route('login.showFormLogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.showFormLogin');
    }

}
