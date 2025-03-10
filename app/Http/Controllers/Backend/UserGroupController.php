<?php

namespace App\Http\Controllers\Backend;

class UserGroupController
{

    public function __construct()
    {

    }

    public function index(){

        return view('backend.UserGroup.index');
    }
}
