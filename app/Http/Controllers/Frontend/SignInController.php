<?php

namespace App\Http\Controllers\Frontend;

class SignInController
{
    public function __construct()
    {

    }

    public function index()
    {

        return view('frontend.Sign In.index'  );
    }
}
