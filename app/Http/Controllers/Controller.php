<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller
{
    //
    public function __construct()
    {

    }

    public function index()
    {
        return view('frontend.app');
    }
}
