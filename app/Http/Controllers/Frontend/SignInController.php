<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class SignInController
{
    public function __construct()
    {

    }

    public function index()
    {

        return view('frontend.Home.signIn');
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
}
