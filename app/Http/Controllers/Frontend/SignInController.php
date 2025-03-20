<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Http;


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
    public function signin(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];


        //dd($credentials, Auth::attempt($credentials), session('error'));

        if (Auth::attempt($credentials)) {


            $user = Auth::user();
            Auth::login($user);

            session(['user_id' => $user->id ]);
            return redirect()->route( 'home.index')->with('success', 'Đăng Nhập Thành Công ');



        } else {
            return redirect()->route('signin.index')->with('error', 'Email hoặc mật khầu không chính xác !');

        }

    }


    // register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>$request->password,
            'otp'=>rand(100000,999999),
            'otp_expire_at'=>now()->addMinutes(10), //dat gioi han otp la thoi diem hien tai +10p  -> qua 10p het han

        ]);
        $brevoApiKey="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";
        $senderEmail="dueling0809@gmail.com";

        Http::withHeaders([
            'acpt'=> 'application/json',
            'apikey'=> $brevoApiKey,
            'content-type'=> 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name'=> 'Unity Coding' , 'email'=> $senderEmail],
            'to' => ['name'=>$user->name,'email'=> $user->email],
            'subject' => 'Ma Kich Hoat',
            'htmlContent' => "<h1> Mã xác thực của bạn : </h1>{$user->otp}",

        ]);
        session(['otp_email' => $user->email]);
        return redirect()->route('verify.otp')->with('success',"Mã otp đã được gửi đến email của bạn . Vui lòng kiểm tra email");
    }
    public function logout(  $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->width('success' ,"Đăng xuất thành công");
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user->otp !== $request->otp) {
            return back()->withErrors(['otp'=> ' Mã OTP sai ! ']);
        }
        if ( Carbon::now()->isAfter($user->otp_expire_at)) {
            return back()->withErrors(['otp'=> ' Mã OTP quá hạn ! ']);
        }
        $user->update([
            'email_verified_at'=>Carbon::now(),
            'otp'=>null,
            'otp_expire_at'=>null,
        ]);
        Auth::login($user);

        return redirect()->route('home')->width('success' ,"Xác thực thành công");
    }

    public function showVerifyFrom(Request $request){

        $email = session('otp_email');
        return view('frontend.Home.verifyOtp',compact('email'));
    }
    public function resendOTP(Request $request)
    {
        $request->validate([
             'email' => 'required|email|unique:users,email',
         ]);

        $user = User::where('email', $request->email)->first();
        $otp = rand(100000,999999);
        $user->update([
             'otp'=>$otp,
            'otp_expire_at'=>Carbon::now()->addMinutes(10),
        ]);
        $brevoApiKey="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";
        $senderEmail="dueling0809@gmail.com";

        $response = Http::withHeaders([
            'acpt'=> 'application/json',
            'apikey'=> $brevoApiKey,
            'content-type'=> 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name'=> 'Unity Coding' , 'email'=> $senderEmail],
            'to' => ['name'=>$user->name,'email'=> $user->email],
            'subject' => 'Ma Kich Hoat',
            'htmlContent' => "<h1> Mã xác thực của bạn : </h1>{$user->otp}",

        ]);
        if(!$response->successful()){
            Log::error("OTP failed");
            return back()->withErrors(['email'=>'Gửi lại không thành công ']);
        }
        session(['otp_email' => $user->email]);
        return back()-> with('success',"Mã otp đã được gửi đến email của bạn . Vui lòng kiểm tra email");
    }

}
