<?php

namespace App\Http\Controllers\Backend;
 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use JetBrains\PhpStorm\NoReturn;

 class DashboardController
{
    public function __construct()
    {

    }
    public function index()
    {
        return view('backend.dashboard.index');

    }
}
