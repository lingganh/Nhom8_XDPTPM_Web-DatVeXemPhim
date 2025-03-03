<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CTPhieuNhapSeeder extends Seeder
{
    public function run()
    {
        DB::table('ct_phieu_nhap')->insert([
            ['idPN' => 'PN01', 'idsp' => 'SP01', 'SL' => 10, 'donGia' => 45000],
            ['idPN' => 'PN02', 'idsp' => 'SP02', 'SL' => 20, 'donGia' => 70000],
        ]);
    }
}
