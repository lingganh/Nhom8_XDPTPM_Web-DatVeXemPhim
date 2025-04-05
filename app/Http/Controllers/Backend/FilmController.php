<?php

namespace App\Http\Controllers\Backend;

use App\Models\Film;
use Illuminate\Support\Facades\DB;


class FilmController
{
    public function __construct()
    {

    }

    public function index(){

        $phims = Film::all();
        return view('backend.film.index', compact('phims'));



    }
    public function getPhimDetails($id)
    {
        $phim = DB::table('phim')->findOrFail($id);
        return response()->json($phim);
    }
}
