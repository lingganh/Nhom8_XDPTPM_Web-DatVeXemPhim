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
        $lichChieus = LichChieu::where('M_id', $M_id)->get();

        return view('booking.showtimes', compact('phim', 'lichChieus'));
    }
    public function showSeats(Request $request, $M_id){

    }
}
