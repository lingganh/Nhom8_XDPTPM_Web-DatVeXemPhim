<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Http\Requests\ResendOtpRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignInController
{
    public function __construct()
    {
    }

    public function showLoginForm()
    {
        return view('client.Home.signIn');
    }

    public function showRegisterForm()
    {
        return view('client.Home.register');
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
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $otp = rand(100000, 999999);
        $otpExpiresAt = now()->addMinutes(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'otp' => $otp,

            'otp_expires_at' =>  $otpExpiresAt,
        ]);

        $brevoApiKey = "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";
        $senderEmail = "885fae005@smtp-brevo.com";

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $brevoApiKey,
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name' => 'FIVE star cinema ', 'email' => $senderEmail],
            'to' => [
                ['email' => $user->email, 'name' => $user->name]
            ],
            'subject' => 'Ma Kich Hoat',
            'htmlContent' => "<h1> Mã xác thực của bạn : {$otp} </h1>",
        ]);

        if ($response->failed()) {
            // Ghi log lỗi nếu gửi không thành công
            Log::error('Email gửi OTP thất bại', $response->json());
            return back()->withErrors(['email' => 'Không thể gửi email xác thực. Vui lòng thử lại sau.']);
        }

        session(['otp_email' => $user->email]);
        return redirect()->route('verify-otp')->with('success', "Mã OTP đã được gửi đến email của bạn. Vui lòng kiểm tra email");
    }

    public function logout( )
    {
        Auth::logout();

        return redirect()->route('home.index')->with('success', "Đăng xuất thành công");
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        $request->validate([

            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();


        if ($user->otp != (int)$request->otp) {
            return redirect()->route('verify-otp')->with('error', 'OTP sai  ! ');
        }


        $user->update([
            'email_verified_at'=>Carbon::now(),
            'otp'=>null,
            'otp_expires_at'=>null,
        ]);
        Auth::login($user);

        return redirect()->route('home.index')->with('success' ,"Xác thực thành công");

    }

    public function showVerifyForm()
    {
        $email = session('otp_email');
        if (!$email) {
            return redirect()->route('register.index')->withErrors(['email' => 'Vui lòng đăng ký lại để nhận OTP!']);
        }

        return view('client.Home.verify-otp', compact('email'));
    }


    public function resendOtp(Request $request)
    {
        $email = session('otp_email');
        //dd(1);
        $user = User::where('email', $email)->first();
        //dd($user);
        // Tạo OTP mới
        $newOtp = rand(100000, 999999);
        $newOtpExpiresAt = now()->addMinutes(10);
        $user->update([
            'otp' => $newOtp,
            'otp_expires_at' => $newOtpExpiresAt,
        ]);

        $brevoApiKey = "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";
        $senderEmail = "885fae005@smtp-brevo.com";

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $brevoApiKey,
            'content-type' => 'application/json',
               ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name' => 'FIVE star cinema ', 'email' => $senderEmail],
            'to' => [
                ['email' => $user->email, 'name' => $user->name]
            ],
            'subject' => 'Ma OTP MOI ',
            'htmlContent' => "<h1> Mã xác thực MỚI của bạn : {$newOtp} </h1>",
        ]);

        if ($response->failed()) {
            Log::error('Gửi OTP thất bại', $response->json());
            return back()->withErrors(['email' => 'Không thể gửi email xác thực. Vui lòng thử lại sau.']);
        }
        session(['otp_email' => $user->email]);

        return back()->with('success', "Mã OTP mới đã được gửi đến email của bạn. Vui lòng kiểm tra email");

    }


}
