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
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $otp = rand(100000, 999999); // Tạo OTP ngẫu nhiên
        $otpExpiresAt = now()->addMinutes(10); // Cộng thêm thời gian hiệu lực OTP

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu
            'otp' => $otp,

            'otp_expires_at' =>  $otpExpiresAt, // Thời hạn OTP là 10 phút
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

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', "Đăng xuất thành công");
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        $request->validate([

            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        // Kiểm tra OTP (nếu không mã hóa)
        if ($user->otp != (int)$request->otp) { // Chuyển đổi $request->otp thành số
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

        return view('frontend.Home.verify-otp', compact('email'));
    }


    public function resendOtp(ResendOtpRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('verify-otp')->with('error', 'Email không tồn tại ! ');
        }

        $otp = rand(100000, 999999);

        $user->update([
            'otp' => $otp, // Lưu OTP không mã hóa
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        $brevoApiKey = "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";
        $senderEmail = "885fae005@smtp-brevo.com";
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $brevoApiKey,
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name' => 'FIVE STAR CINEMA', 'email' => $senderEmail],
            'to' => [
                ['email' => $user->email, 'name' => $user->name]
            ],
            'subject' => 'Cập nhật mã OTP',
            'htmlContent' => "<h1> Mã xác thực mới của bạn : </h1>{$otp}",
        ]);

        if ($response->failed()) {
            // Ghi log lỗi nếu gửi không thành công
            Log::error('Gửi lại OTP thất bại', $response->json());
            return redirect()->route('verify-otp')->with('error', 'Không thể gửi lại mã OTP. Vui lòng thử lại sau.');
        }

        return redirect()->route('verify-otp')->with('success', "Mã OTP mới đã được gửi đến email của bạn. Vui lòng kiểm tra email");
    }
}
