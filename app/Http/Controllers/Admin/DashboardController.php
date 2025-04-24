<?php

namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use JetBrains\PhpStorm\NoReturn;
 use  App\Http\Requests\AuthRequest;
 use Illuminate\Support\Facades\Auth;
 class DashboardController
{
    public function __construct()
    {

    }
    public function index()
    {


        $template = 'admin.dashboard.home.index';
        return view('admin.dashboard.layout' ,compact ('template'));

    }


}
