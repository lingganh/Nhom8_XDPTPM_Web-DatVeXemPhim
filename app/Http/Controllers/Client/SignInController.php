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
use Illuminate\Support\Str;

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
           // dd($user->email);
            if($user->otp != null) {
               // session(['otp_email' => $user->email]);

                return redirect()->route('verify-otp')->with('warning', 'Tài khoản của bạn cần được xác thực. Vui lòng nhập mã OTP đã được gửi đến email của bạn.');
            }
            else{
                Auth::login($user);
                session(['user_id' => $user->id]);
                return redirect()->route('home.index')->with('success', 'Đăng Nhập Thành  Công');
            }

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

        $subject = 'Mã Kích Hoạt';
        $messageContent = "<h1> Mã xác thực của bạn : {$otp} </h1>";

        \Mail::raw($messageContent, function ($message) use ($user, $subject) {
            $message->to($user->email, $user->name)
                ->subject($subject);
        });

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


            $messageContent = "<h1> Mã xác thực MỚI của bạn : {$newOtp} </h1>";
            $mail=$user->email;

            \Mail::raw($messageContent, function ($message)  use ($mail) {

                $message->to($mail)
                    ->subject('Mã OTP MỚI');
            });

        session(['otp_email' => $user->email]);

        return back()->with('success', "Mã OTP mới đã được gửi đến email của bạn. Vui lòng kiểm tra email");

    }
    public function showForgotPasswordForm()
    {
        return view('client.Home.fpass');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $email = $request->email;
        $user = User::where('email',  $email)->firstOrFail();

         $token = Str::random(60);

         $user->update([
            'reset_token' => $token,
            'reset_token_expires_at' => now()->addMinutes(60), // Token hết hạn sau 60 phút
        ]);

        // Gửi email chứa link reset mật khẩu
        $resetLink = route('password.reset.form', ['token' => $token, 'email' => $user->email]);
        $subject = 'Yêu cầu đặt lại mật khẩu';
        $messageContent = "<h1>Xin chào " . e($user->name) . ",</h1>";
        $messageContent .= "<p>Bạn vừa yêu cầu đặt lại mật khẩu cho tài khoản của mình.</p>";
        $messageContent .= "<p>Vui lòng nhấp vào link sau để đặt lại mật khẩu:</p>";
        $messageContent .= "<p><a href='" . e($resetLink) . "'>" . e($resetLink) . "</a></p>";
        $messageContent .= "<p>Link này sẽ hết hạn sau 60 phút.</p>";
        $messageContent .= "<p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>";
        $messageContent .= "<p>Trân trọng,</p>";
        $messageContent .= "<p>Đội ngũ của bạn</p>";

        \Mail::raw($messageContent, function ($message) use ($user, $subject) {
            $message->to($user->email, $user->name)
                ->subject($subject);
        });

        return back()->with('success', 'Link đặt lại mật khẩu đã được gửi đến email của bạn. Vui lòng kiểm tra email.');
    }

    public function showResetPasswordForm(string $token, string $email)
    {
        //dd($email);
        $user = User::where('email', $email)->where('reset_token', $token);

        if (!$user) {
            return redirect()->route('signin.index')->with('error', 'Link đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.');
        }

        return view('client.Home.reset-password', compact('token', 'email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $email =$request->email;
        $token=$request->token;
      //  dd($email);
       // dd($request->all());
        $user = User::where('email',  $email)
            ->where('reset_token',  $token)
            ->first();
        ;

        if (!$user) {
            return redirect()->route('signin.index')->with('error', 'Link đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.');
        }

        $user->update([
            'password' => bcrypt($request->password), // Hash mật khẩu mới trước khi lưu
            'reset_token' => null,
            'reset_token_expires_at' => null,
        ]);

        return redirect()->route('signin.index')->with('success', 'Mật khẩu của bạn đã được đặt lại thành công. Vui lòng đăng nhập.');
    }
}
