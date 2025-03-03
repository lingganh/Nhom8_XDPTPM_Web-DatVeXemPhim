<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichChieuSeeder extends Seeder
{
    public function run()
    {
        DB::table('lich_chieu')->insert([
            ['idLC' => 'LC01', 'PC_id' => 'PC01', 'M_id' => 'M01', 'ngayChieu' => '2025-01-05', 'gioBD' => '2025-01-05 18:00:00', 'thoiLong' => 120],
            ['idLC' => 'LC02', 'PC_id' => 'PC02', 'M_id' => 'M02', 'ngayChieu' => '2025-01-06', 'gioBD' => '2025-01-06 20:00:00', 'thoiLong' => 150],
        ]);
    }
}
