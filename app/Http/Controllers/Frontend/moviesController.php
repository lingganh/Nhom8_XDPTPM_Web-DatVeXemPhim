<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class moviesController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('frontend.movies.index', compact('films'));
    }

    public function detail($M_id)
    {
        $film = Film::with('lichChieu')->find($M_id);

        if (!$film) {
            abort(404);
        }
        $ngayList = $film->lichChieu
            ->pluck('ngayChieu')
            ->unique()
            ->sort()
            ->map(function ($ngay) {
                return \Carbon\Carbon::parse($ngay)->format('d/m');
            });

        $lichChieu = $film->lichChieu
            ->sortBy('gioBD') // sắp xếp theo thời gian bắt đầu
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->ngayChieu)->format('d/m');
            })->map(function ($group) {
                return [
                    'Sáng' => $group->filter(function ($item) {
                        $hour = \Carbon\Carbon::parse($item->gioBD)->hour;
                        return $hour >= 5 && $hour < 12;
                    }),
                    'Chiều' => $group->filter(function ($item) {
                        $hour = \Carbon\Carbon::parse($item->gioBD)->hour;
                        return $hour >= 12 && $hour < 18;
                    }),
                    'Tối' => $group->filter(function ($item) {
                        $hour = \Carbon\Carbon::parse($item->gioBD)->hour;
                        return $hour >= 18 && $hour < 24;
                    }),
                ];

            });

        return view('frontend.movies.show', compact('film', 'lichChieu'));
    }
}
