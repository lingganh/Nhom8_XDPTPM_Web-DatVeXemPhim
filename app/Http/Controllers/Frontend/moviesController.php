<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use Illuminate\Http\Request;
class moviesController extends Controller
{
    public function index()
    {
        // Lấy tất cả các phim
        $films = Film::all();
        // Truyền dữ liệu phim vào view
        return view('frontend.movies.index', compact('films'));

    }

    public function show($M_id)
    {


        $film = Film::find($M_id);

        if (!$film) {
            abort(404);  // Nếu không tìm thấy phim, trả về lỗi 404
        }

        return view('frontend.movies.show', compact('film'));
    }
}
?>
