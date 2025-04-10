<?php

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\LichChieu;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showShowtimes(Request $request, $phim_id)
    {
        $phim =Film ::findOrFail($phim_id);
        $lichChieus = LichChieu::where('phim_id', $phim_id)
            ->where('thoi_gian_bat_dau', '>=', now()) // Lấy lịch chiếu từ thời điểm hiện tại
            ->orderBy('thoi_gian_bat_dau')
            ->get();

        return view('booking.showtimes', compact('phim', 'lichChieus'));
    }
}
