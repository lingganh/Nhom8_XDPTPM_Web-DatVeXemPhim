<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Http\Requests\ResendOtpRequest;
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
        $otp = rand(100000, 999999); // Tạo OTP ngẫu nhiên

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu
            'otp' => rand(100000, 999999),

            'otp_expires_at' => now()->addMinutes(10), // Thời hạn OTP là 10 phút
        ]);

        $brevoApiKey = "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";
        $senderEmail = "dueling0809@gmail.com";

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $brevoApiKey,
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name' => 'Unity Coding', 'email' => $senderEmail],
            'to' => [
                ['email' => $user->email, 'name' => $user->name]
            ],
            'subject' => 'Ma Kich Hoat',
            'htmlContent' => "<h1> Mã xác thực của bạn : </h1>{$otp}",
        ]);

        if ($response->failed()) {
            // Ghi log lỗi nếu gửi không thành công
            Log::error('Email gửi OTP thất bại', $response->json());
            return back()->withErrors(['email' => 'Không thể gửi email xác thực. Vui lòng thử lại sau.']);
        }

        session(['otp_email' => $user->email]);
        return redirect()->route('verify-otp')->with('success', "Mã OTP đã được gửi đến email của bạn. Vui lòng kiểm tra email");
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

        // Kiểm tra email hợp lệ và OTP
        if (!$user) {
            return back()->withErrors(['email' => 'Email không hợp lệ!']);
        }

        if (!Hash::check($request->otp, $user->otp)) {
            return back()->withErrors(['otp' => 'Mã OTP sai!']);
        }

        // Kiểm tra thời gian hết hạn OTP
        if (Carbon::now()->isAfter($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Mã OTP đã hết hạn!']);
        }

        // Xác thực thành công, cập nhật thông tin người dùng
        $user->update([
            'email_verified_at' => Carbon::now(),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('success', "Xác thực thành công");
    }

    public function showVerifyForm()
    {
        $email = session('otp_email');
        return view('frontend.Home.verify-otp', compact('email'));
    }

    public function resendOTP(ResendOtpRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email không tồn tại!']);
        }

        $otp = rand(100000, 999999); // Tạo OTP mới

        $user->update([
            'otp' => Hash::make($otp), // Mã hóa OTP mới
            'otp_expires_at' => now()->addMinutes(10), // Cập nhật thời gian hết hạn
        ]);

        $brevoApiKey = "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";
        $senderEmail = "dueling0809@gmail.com";
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $brevoApiKey,
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name' => 'Unity Coding', 'email' => $senderEmail],
            'to' => [
                ['email' => $user->email, 'name' => $user->name]
            ],
            'subject' => 'Cập nhật mã OTP',
            'htmlContent' => "<h1> Mã xác thực mới của bạn : </h1>{$otp}",
        ]);

        if ($response->failed()) {
            // Ghi log lỗi nếu gửi không thành công
            Log::error('Gửi lại OTP thất bại', $response->json());
            return back()->withErrors(['email' => 'Không thể gửi lại mã OTP. Vui lòng thử lại sau.']);
        }

        return back()->with('success', "Mã OTP mới đã được gửi đến email của bạn. Vui lòng kiểm tra email");
    }
}
