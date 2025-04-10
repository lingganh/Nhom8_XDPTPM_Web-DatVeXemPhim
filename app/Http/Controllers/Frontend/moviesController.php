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

    public function detail($M_id)
    {
        $film = Film::with('lichChieu')->find($M_id);

        if (!$film) {
            abort(404);
        }

        $lichChieu = collect(); // tạo collection rỗng mặc định

        $lichChieu = $film->lichChieu->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->ngayChieu)->format('d/m');
        })->map(function ($group) {
            return $group->groupBy(function ($item) {
                $hour = \Carbon\Carbon::parse($item->gioBD)->hour;
                if ($hour < 12) return 'Sáng';
                elseif ($hour < 18) return 'Chiều';
                else return 'Tối';
            });
        });
        return view('frontend.movies.show', compact('film', 'lichChieu'));
    }

}
