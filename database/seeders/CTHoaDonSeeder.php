<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CTHoaDonSeeder extends Seeder
{
    public function run()
    {
        DB::table('ct_hoa_don')->insert([
            ['idHD' => 'HD01', 'idsp' => '1', 'SL' => 2, 'donGia' => 50000],
            ['idHD' => 'HD02', 'idsp' => '2', 'SL' => 1, 'donGia' => 75000],
            ['idHD' => 'HD03', 'idsp' => '1', 'SL' => 1, 'donGia' => 150000],
        ]);
    }
}
