<?php

namespace App\Http\Controllers\Frontend;



 use App\Models\Film;
use App\Models\LichChieu;
use Illuminate\Http\Request;

class BookingController
{
    public function showShowtimes(Request $request, $M_id)
    {
        $phim = Film ::findOrFail($M_id);
        $lichChieus = LichChieu::where('phim_id', $M_id)
            ->where('thoi_gian_bat_dau', '>=', now()) // Lấy lịch chiếu từ thời điểm hiện tại
            ->orderBy('thoi_gian_bat_dau')
            ->get();

        return view('booking.showtimes', compact('phim', 'lichChieus'));
    }
}
