<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    }
}
