<?php

namespace App\Http\Controllers\Backend;

class movieShowtimeController
{

    public function __construct()
    {

    }

    public function index(){

        return view('backend.moviveShowtime.index');
    }
}
