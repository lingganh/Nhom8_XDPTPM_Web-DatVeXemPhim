<?php

namespace App\Http\Controllers\Backend;

class ticketController
{

    public function __construct()
    {

    }

    public function index(){

        return view('backend.ticket.index');
    }
}
