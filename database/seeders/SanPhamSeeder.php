<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san_pham')->insert([
            ['idsp' => 'SP001', 'tenSP' => 'Vé','donGia' => 50000],
            ['idsp' => 'SP002', 'tenSP' => 'Nước','donGia' => 15000],
            ['idsp' => 'SP003', 'tenSP' => 'Bắp Rang','donGia' => 50000],
            ['idsp' => 'SP004', 'tenSP' => 'Combo Nhỏ','donGia' => 100000],
            ['idsp' => 'SP005', 'tenSP' => 'Combo Lớn','donGia' => 150000],
        ]);
    }
}
