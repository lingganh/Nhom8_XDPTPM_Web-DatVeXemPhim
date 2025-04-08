<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Models\User;







class UserController {
    public function __construct()
    {

    }

    public function index(Request $request){
        try {
            $query = $request->input('query');

            if ($query) {
                $users = User::where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('phone', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%')
                     ->orWhere('birthday', 'like', '%' . $query . '%')
                    ->get();
                if($users->isEmpty()){
                    $users = User::all();
                }
            } else {
                $users = User::all();
            }

            return view('backend.user.index', compact('users'));
        } catch (\Exception $e) {

            return view('backend.user.index')->with('error', 'Đã xảy ra lỗi khi tải danh sách người dùng.');
        }
    }
}
