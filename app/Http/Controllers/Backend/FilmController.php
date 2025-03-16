<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;

class FilmController
{
    public function __construct()
    {

    }

    public function index(){

        $phims = DB::table('phim')
            ->whereIn('trangThai', ['Đang chiếu', 'Sắp chiếu'])
            ->get();
        return view('backend.film.index', compact('phims'));


    }
}
