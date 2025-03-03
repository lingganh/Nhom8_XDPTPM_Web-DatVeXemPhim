<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeder extends Seeder
{
    public function run()
    {
        DB::table('khach_hang')->insert([
            [
                'KH_id' => 'KH01',
                'TenKH' => 'Nguyen Van A',
                'GioiTinh' => 'Nam',
                'CCCD' => '12345678901',
                'diaChi' => '123 ABC Street',
                'birthday' => '1990-01-01',
                'SDT' => '0912345678',
            ],
            [
                'KH_id' => 'KH02',
                'TenKH' => 'Tran Thi B',
                'GioiTinh' => 'Nu',
                'CCCD' => '09876543210',
                'diaChi' => '456 DEF Street',
                'birthday' => '1995-05-05',
                'SDT' => '0987654321',
            ],
        ]);
    }
}
