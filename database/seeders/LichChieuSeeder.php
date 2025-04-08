<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichChieuSeeder extends Seeder
{
    public function run()
    {
        DB::table('lich_chieu')->insert([
            [ 'PC_id' => '1', 'M_id' => 'F001', 'ngayChieu' => '2025-01-05', 'gioBD' => '2025-01-05 18:00:00', 'thoiLuong' => 120],
            [ 'PC_id' => '2', 'M_id' => 'F002', 'ngayChieu' => '2025-01-06', 'gioBD' => '2025-01-06 20:00:00', 'thoiLuong' => 150],
        ]);
    }
}
