<?php

namespace App\Http\Controllers\Backend;

class RevenueController
{
    public function __construct()
    {

    }

    public function index(){

        return view('backend.Revenue.index');
    }
}
