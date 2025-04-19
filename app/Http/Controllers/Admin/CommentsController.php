<?php

namespace App\Http\Controllers\Admin;

class CommentsController
{
    public function __construct()
    {

    }

    public function index(){

        return view('admin.comments.index');
    }
}
