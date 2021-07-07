<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function sendMailForgetPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('mail.mail-reset-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Password Notification');
            $message->from('hungq394@gmail.com', 'DH Book-Store');
        });
        Toastr::success('We have e-mailed your password reset link!', 'Email');
        return back();
    }

    public function showFormResetPassword($token)
    {
        return view('Auth.reset-password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
        ]);

        $updatePassword = PasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();
        if (!$updatePassword)
            return back()->withInput()->with('error-token', 'Invalid token!');

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->input('password'))]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        session()->flash('resetPasswordSuccess', 'Your password has been changed! Please login to continue!');
        return redirect()->route('login.showFormLogin');
    }
}
