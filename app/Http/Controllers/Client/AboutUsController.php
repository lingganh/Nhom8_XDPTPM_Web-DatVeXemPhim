<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
class AboutUsController extends Controller
{
    public function index()
    {
        return view('Client.about');
    }

}
