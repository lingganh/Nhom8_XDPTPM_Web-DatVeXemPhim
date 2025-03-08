<?php

namespace App\Http\Controllers\Backend;
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



        return view('backend.dashboard.index' );

    }


}
