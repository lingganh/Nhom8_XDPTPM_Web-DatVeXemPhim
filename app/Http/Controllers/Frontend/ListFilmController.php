<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ListFilmController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('frontend.Home.listFilm');
    }
}
