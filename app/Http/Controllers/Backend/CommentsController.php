<?php

namespace App\Http\Controllers\Backend;

class CommentsController
{
    public function __construct()
    {

    }

    public function index(){

        return view('backend.comments.index');
    }
}
