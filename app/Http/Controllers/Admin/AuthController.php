<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }
    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];


      //dd($credentials, Auth::attempt($credentials), session('error'));

        if (Auth::attempt($credentials)  ) {
            // $request->session()->regenerate();
            //$userName = Auth::user()->name;

             // dd(Auth::user() );
            if (Auth::check() && Auth::user()->role != null) {
                $request->session()->regenerate();
                return redirect()->route('dashboard.index')->with('success', 'Đăng Nhập Thành Công ');
            } else {
                Auth::logout();
                return redirect()->route('auth.admin')->with('error', 'Bạn không có quyền truy cập hoặc có lỗi xảy ra!');
            }

        }


       // echo 2; die();
    }

    public function logout( Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
