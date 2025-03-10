<?php

namespace App\Http\Controllers\Backend;

class FilmController
{
    public function __construct()
    {

    }

    public function index(){

        return view('backend.film.index');
    }
}
