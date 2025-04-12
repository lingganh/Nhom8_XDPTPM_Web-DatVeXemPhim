<?php

namespace App\Http\Controllers\Frontend;



use App\Models\Film;
use App\Models\Ghe;
use App\Models\LichChieu;
use App\Models\SanPham;
use App\Models\Ve;
use Illuminate\Http\Request;

class BookingController
{
    public function showShowtimes(Request $request, $M_id)
    {
        $phim = Film ::findOrFail($M_id);
        $lichChieus = LichChieu::where('M_id', $M_id)->get();

        return view('booking.showtimes', compact('phim', 'lichChieus'));
    }
    public function showSeats(Request $request, $lich_chieu_id)
    {
        $lichChieu = LichChieu::findOrFail($lich_chieu_id);
        $phongChieu = $lichChieu->phongChieu;
        $gheDaDat = Ve::where('idLC', $lich_chieu_id)->pluck('idG')->toArray();

        $allSeats = Ghe::where('PC_id', $phongChieu->PC_id)->get();

        return view('booking.seats', compact('lichChieu', 'phongChieu', 'gheDaDat', 'allSeats'));
    }
    public function processSeatSelection(Request $request)
    {
        //luu vao section
         $lichChieuId = $request->input('lich_chieu_id');
        $selectedSeats = json_decode($request->input('selected_seats'));

         session(['lich_chieu_id' => $lichChieuId]);
        session(['selected_seats' => $selectedSeats]);


         return redirect()->route('booking.select-food');
    }
    public function showSelectFood()
    {
         $foodItems = SanPham::all();

        return view('booking.select_food', compact('foodItems'));
    }
    public function confirm(Request $request){
//mảng món ăn
        $selectedFood = $request->input('food');
        //dd($selectedFood);
         $lichChieuId = session('lich_chieu_id');
        $selectedSeats = session('selected_seats');
        $seatPrice = 75000;
        $totalSeatPrice = count($selectedSeats) * $seatPrice;

        session(['total_seat_price' => $totalSeatPrice]);        $giadoan=0;
        $spchon=SanPham::find(array_keys($selectedFood));

        if($spchon){
            foreach ($spchon as $sp) {

                    $soluong = $selectedFood[$sp->idsp]??0;
                    $giadoan += $sp->donGia *$soluong;
            }
        }


        session(['giaHD' => $giadoan]);

        return view('booking.confimation', compact('selectedSeats', 'selectedFood', 'giadoan', 'spchon','totalSeatPrice'));


    }
    public function payment(Request $request){

        //
        return view('booking.payment');
    }
}
