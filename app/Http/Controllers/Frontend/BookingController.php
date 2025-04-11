<?php

namespace App\Http\Controllers\Frontend;



use App\Models\Film;
use App\Models\Ghe;
use App\Models\LichChieu;
use App\Models\SanPham;
use App\Models\Ve;
use Illuminate\Http\Request;
use App\Models\FoodItem; // Import model FoodItem (nếu bạn có)

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
        // Logic xử lý ghế đã chọn (lưu vào session, database tạm, v.v.)
        $lichChieuId = $request->input('lich_chieu_id');
        $selectedSeats = json_decode($request->input('selected_seats'));

        // Lưu thông tin vào session (ví dụ)
        session(['lich_chieu_id' => $lichChieuId]);
        session(['selected_seats' => $selectedSeats]);

        // Chuyển hướng đến trang chọn bỏng nước
        return redirect()->route('booking.select-food');
    }
    public function showSelectFood()
    {
         $foodItems = SanPham::all();

        return view('booking.select_food', compact('foodItems'));
    }
}
