<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoaDonSeeder extends Seeder
{
    public function run()
    {
        DB::table('hoa_don')->insert([
            ['idHD' => 'HD01', 'idKH' => 'KH01', 'tongTien' => 100000, 'NgayXuat' => now()],
            ['idHD' => 'HD02', 'idKH' => 'KH02', 'tongTien' => 75000, 'NgayXuat' => now()],
        ]);
    }
}
