<?php

namespace App\Http\Controllers\Backend;

use App\Models\Film;
use http\Client\Request;
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
    public function update(Request $request)
    {
        $phimId = $request->input('M_id');
        $phim = DB::table('phim')::findOrFail($phimId);
        $phim->update($request->except('M_id'));

        return redirect()->route('films')->with('success', 'Thông tin phim đã được cập nhật thành công!');
    }
}
