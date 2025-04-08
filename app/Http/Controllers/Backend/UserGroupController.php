<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;

class UserGroupController
{

    public function __construct()
    {

    }

    public function index(){
        $users=User::all();
        $superAdmins = User::where('role', 1)->get();
        $Admins = User::where('role', 2)->get();
        $normalUsers = User::where('role')->get();

        return view('backend.UserGroup.index',compact('superAdmins','Admins','normalUsers','users'));
    }
    public function updateRole(Request $request, User $user)
    {

        $user->update(['role' => $request->input('role')]);

        return redirect()->route('usergroup.index')->with('success', 'Vai trò người dùng đã được cập nhật thành công.');
    }
}
