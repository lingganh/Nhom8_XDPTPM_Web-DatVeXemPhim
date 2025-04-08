<?php

namespace App\Http\Controllers\Backend;

use App\Models\Film;
use Illuminate\Http\Request;

class movieShowtimeController
{

    public function __construct()
    {

    }

    public function index(){

        return view('backend.moviveShowtime.index');
    }

    public function movieIndex(Request $request){

        $phims = Film::query();

        if($request->has('keyword')){
            $phims->where('tenPhim', 'like', '%'.$request->keyword.'%');
        }
        if($request->has('sort')){


            if($request->sort == 'name_z_a'){
                $phims->orderBy('tenPhim', 'desc');
            }
            if($request->sort == 'name_a_z'){
                $phims->orderBy('tenPhim', 'asc');
            }
            if($request->sort == 'time_asc'){

                $phims->orderBy('thoiLuong', 'asc');
            }
            if($request->sort == 'time_desc'){
                $phims->orderBy('thoiLuong', 'desc');
            }
        }
        $phims = $phims->paginate(12);
        return view('backend.moviveShowtime.movie_index', compact('phims'));
    }
}
