<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Film;
use App\Models\PhongChieu; // Import model PhongChieu
use Carbon\Carbon;

class LichChieuSeeder extends Seeder
{
    public function run()
    {
        // Dữ liệu lịch chiếu ban đầu (ví dụ)
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

        // Các khung giờ cố định
        $showtimes = [
            'Sáng' => ['08:00', '10:30'],
            'Chiều' => ['12:00', '14:30', '16:30'],
            'Tối' => ['18:30', '20:00', '22:00']
        ];

        // Lấy tất cả các phim
        $films = Film::all();

        // Lấy tất cả các ID phòng chiếu
        $phongChieuIds = PhongChieu::pluck('PC_id')->toArray();

        foreach ($films as $film) {
            if (!$film->thoiLuong) continue;

            for ($i = 0; $i <= 6; $i++) {
                $currentDate = $today->copy()->addDays($i);

                foreach ($showtimes as $session => $times) {
                    foreach ($times as $time) {
                        $startTime = Carbon::parse($currentDate->toDateString() . ' ' . $time);

                        $exists = DB::table('lich_chieu')->where([
                            ['M_id', '=', $film->M_id],
                            ['ngayChieu', '=', $currentDate->toDateString()],
                            ['gioBD', '=', $startTime->format('Y-m-d H:i:s')]
                        ])->exists();

                        if (!$exists && $phongChieuIds) { // Kiểm tra nếu có phòng chiếu
                            $randomPhongChieuId = $phongChieuIds[array_rand($phongChieuIds)];

                            DB::table('lich_chieu')->insert([
                                'PC_id' => $randomPhongChieuId, // Gán PC_id ngẫu nhiên
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
