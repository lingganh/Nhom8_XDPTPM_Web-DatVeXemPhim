<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Film;
use Carbon\Carbon;

class LichChieuSeeder extends Seeder
{
    public function run()
    {
        DB::table('lich_chieu')->insert([
            [ 'PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-13', 'gioBD' => '2025-04-13 18:00:00', 'thoiLuong' => 120],
            [ 'PC_id' => '2', 'M_id' => '1', 'ngayChieu' => '2025-04-13', 'gioBD' => '2025-04-13 8:00:00', 'thoiLuong' => 120],
            [ 'PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-13', 'gioBD' => '2025-04-13 20:00:00', 'thoiLuong' => 120],
            [ 'PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-14', 'gioBD' => '2025-04-14 8:00:00', 'thoiLuong' => 120],
            [ 'PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-14', 'gioBD' => '2025-04-14 18:00:00', 'thoiLuong' => 120],
            [ 'PC_id' => '2', 'M_id' => '2', 'ngayChieu' => '2025-01-06', 'gioBD' => '2025-01-06 20:00:00', 'thoiLuong' => 150],
        ]);
        // Lấy ngày hôm nay
        $today = Carbon::today();

        // Các khung giờ cố định cho Sáng, Chiều, Tối
        $showtimes = [
            'Sáng' => ['08:00', '10:30'],
            'Chiều' => ['12:00', '14:30', '16:30'],
            'Tối' => ['18:30', '20:00', '22:00']
        ];

        // Lấy thông tin phim từ bảng `phim` qua Eloquent
        $films = Film::all(); // Lấy tất cả các phim

        // Duyệt qua từng phim
        foreach ($films as $film) {
            for ($i = 0; $i <= 6; $i++) {
                // Lấy ngày chiếu (tính từ hôm nay đến 6 ngày sau)
                $currentDate = $today->copy()->addDays($i)->format('Y-m-d');

                // Duyệt qua các khung giờ để tạo lịch chiếu
                foreach ($showtimes as $session => $times) {
                    foreach ($times as $time) {
                        // Tính thời gian bắt đầu
                        $startTime = Carbon::parse("$currentDate $time");

                        // Lấy thời gian chiếu từ bảng phim
                        $duration = $film->thoiLuong; // Thời lượng từ bảng phim

                        // Chèn dữ liệu vào bảng `lich_chieu`
                        DB::table('lich_chieu')->insert([
                            'PC_id' => $film->M_id, // PC_id lấy từ M_id của phim
                            'M_id' => $film->M_id,  // M_id cũng có thể là id phim hoặc có bảng liên quan khác
                            'ngayChieu' => $currentDate,
                            'gioBD' => $startTime->format('Y-m-d H:i:s'),
                            'thoiLuong' => $duration
                        ]);
                    }
                }
            }
        }
    }
}
