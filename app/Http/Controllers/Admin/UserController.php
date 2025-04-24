<?php

namespace App\Http\Controllers\Admin;


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

            return view('admin.user.index', compact('users'));
        } catch (\Exception $e) {

            return view('admin.user.index')->with('error', 'Đã xảy ra lỗi khi tải danh sách người dùng.');
        }
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('user.index')->with('success', 'Cập nhật user thành công!');
    }
    public function create (Request $request)
    {
        //  dd(request());
        $data = $request->all();
        // dd($data);
        User::create($data);
        return redirect()->route('user.index')->with('success', 'Thêm user thành công!');
    }
    public function delete ($id)
    {
        //  dd(request());

        // dd($data);

        User::destroy($id);

        return redirect()->route('user.index')->with('success', 'Xóa user thành công!');
    }
}
