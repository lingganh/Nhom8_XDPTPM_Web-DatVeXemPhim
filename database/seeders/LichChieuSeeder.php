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
            ['PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-13', 'gioBD' => '2025-04-13 18:00:00', 'thoiLuong' => 120],
            ['PC_id' => '2', 'M_id' => '1', 'ngayChieu' => '2025-04-13', 'gioBD' => '2025-04-13 8:00:00', 'thoiLuong' => 120],
            ['PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-13', 'gioBD' => '2025-04-13 20:00:00', 'thoiLuong' => 120],
            ['PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-14', 'gioBD' => '2025-04-14 8:00:00', 'thoiLuong' => 120],
            ['PC_id' => '1', 'M_id' => '1', 'ngayChieu' => '2025-04-14', 'gioBD' => '2025-04-14 18:00:00', 'thoiLuong' => 120],
            ['PC_id' => '2', 'M_id' => '2', 'ngayChieu' => '2025-01-06', 'gioBD' => '2025-01-06 20:00:00', 'thoiLuong' => 150],
        ]);
        // Lấy ngày hôm nay
        $today = Carbon::today();

// Các khung giờ cố định cho Sáng, Chiều, Tối
        $showtimes = [
            'Sáng' => ['08:00', '10:30'],
            'Chiều' => ['12:00', '14:30', '16:30'],
            'Tối' => ['18:30', '20:00', '22:00']
        ];

// Lấy tất cả các phim
        $films = Film::all();

        foreach ($films as $film) {
            // Nếu chưa có thời lượng thì bỏ qua
            if (!$film->thoiLuong) continue;

            for ($i = 0; $i <= 6; $i++) {
                // Lấy ngày chiếu từ hôm nay đến 6 ngày sau
                $currentDate = $today->copy()->addDays($i);

                foreach ($showtimes as $session => $times) {
                    foreach ($times as $time) {
                        $startTime = Carbon::parse($currentDate->toDateString() . ' ' . $time);

                        // Kiểm tra nếu lịch chiếu đã tồn tại (tránh nhân đôi)
                        $exists = DB::table('lich_chieu')->where([
                            ['M_id', '=', $film->M_id],
                            ['ngayChieu', '=', $currentDate->toDateString()],
                            ['gioBD', '=', $startTime->format('Y-m-d H:i:s')]
                        ])->exists();

                        if (!$exists) {
                            DB::table('lich_chieu')->insert([
                                'PC_id' => $film->M_id, // Giả sử PC_id bạn đang dùng giống M_id
                                'M_id' => $film->M_id,
                                'ngayChieu' => $currentDate->toDateString(),
                                'gioBD' => $startTime->format('Y-m-d H:i:s'),
                                'thoiLuong' => $film->thoiLuong
                            ]);
                        }
                    }
                }
            }
        }
    }
}
