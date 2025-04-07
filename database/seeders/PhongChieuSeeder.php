<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongChieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phong_chieu')->insert([
            [
                'ten_phong' => 'Phòng 1',
                'so_luong_ghe' => 120,
                'loai_phong' => '2D',
                'mo_ta' => 'Phòng chiếu tiêu chuẩn với màn hình lớn.',
                'trang_thai' => 1,

            ],
            [
                'ten_phong' => 'Phòng VIP',
                'so_luong_ghe' => 50,
                'loai_phong' => '3D',
                'mo_ta' => 'Phòng VIP với ghế đôi thoải mái và kính 3D.',
                'trang_thai' => 1,

            ],
            [
                'ten_phong' => 'Rạp IMAX',
                'so_luong_ghe' => 200,
                'loai_phong' => 'IMAX',
                'mo_ta' => 'Trải nghiệm điện ảnh đỉnh cao với công nghệ IMAX.',
                'trang_thai' => 1,

            ],

        ]);
    }
}
