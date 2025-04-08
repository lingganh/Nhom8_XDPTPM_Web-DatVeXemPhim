<?php

namespace App\Http\Controllers\Backend;

use App\Models\Film;
use Illuminate\Support\Facades\DB;
 use Illuminate\Http\Request;


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
    public function update(Request $request, $id)
    {
        $phim = Film::findOrFail($id);
        $data = $request->all();
        $phim->update($data);
        return redirect()->route('films.index ')->with('success', 'Cập nhật phim thành công!');
    }
    public function create (Request $request)
    {
       //  dd(request());
        $data = $request->all();
       // dd($data);
        Film::create($data);
        return redirect()->route('films.index ')->with('success', 'Thêm phim thành công!');
    }
    public function delete (Request $request)
    {
        //  dd(request());
        $data = $request->all();
        // dd($data);
        Film::create($data);
        return redirect()->route('films.index ')->with('success', 'Thêm phim thành công!');
    }
}
