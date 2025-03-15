<?php

use Illuminate\Support\Facades\DB;

class ListFilmController
{
    public function __construct()
    {

    }

    public function index()
    {

        return view('frontend.ListFilm.index' );
    }
}
