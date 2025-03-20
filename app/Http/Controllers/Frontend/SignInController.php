<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Http\Requests\ResendOtpRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail; // Thêm dòng này
use App\Mail\OtpMail; // Thêm dòng này, giả sử bạn có Mailable class OtpMail

class SignInController
{
    public function __construct()
    {
    }

    public function showLoginForm()
    {
        return view('frontend.Home.signIn');
    }

    public function showRegisterForm()
    {
        return view('frontend.Home.register');
    }

    public function signin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Auth::login($user);
            session(['user_id' => $user->id]);
            return redirect()->route('home.index')->with('success', 'Đăng Nhập Thành Công');
        } else {
            return redirect()->route('signin.index')->with('error', 'Email hoặc mật khẩu không chính xác !');
        }
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'otp' => rand(100000, 999999),
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Sử dụng Laravel's Mail
        Mail::to($user->email)->send(new OtpMail($user->otp));

        session(['otp_email' => $user->email]);
        return redirect()->route('verify-otp')->with('success', "Mã otp đã được gửi đến email của bạn . Vui lòng kiểm tra email");
    }

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', "Đăng xuất thành công");
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || $user->otp != $request->otp) {
            return back()->withErrors(['otp' => 'Mã OTP sai !']);
        }
        if (Carbon::now()->isAfter($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Mã OTP quá hạn !']);
        }
        $user->update([
            'email_verified_at' => Carbon::now(),
            'otp' => null,
            'otp_expires_at' => null,
        ]);
        Auth::login($user);

        return redirect()->route('home')->with('success', "Xác thực thành công");
    }

    public function showVerifyFrom()
    {
        $email = session('otp_email');
        return view('frontend.Home.verifyOtp', compact('email'));
    }

    public function resendOTP(ResendOtpRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email không tồn tại!']);
        }
        $otp = rand(100000, 999999);
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        // Sử dụng Laravel's Mail
        Mail::to($user->email)->send(new OtpMail($otp));

        session(['otp_email' => $user->email]);
        return back()->with('success', "Mã otp đã được gửi đến email của bạn . Vui lòng kiểm tra email");
    }
}
