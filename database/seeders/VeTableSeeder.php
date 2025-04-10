<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ve')->delete(); // Xóa dữ liệu cũ trước khi seed (tùy chọn)
        $faker = Faker::create('vi_VN');
        $phongChieux = ['1', '2', '3'];
        $rows = ['A', 'B', 'C', 'D', 'E'];

        foreach (range(1, 100) as $index) { // Tạo 100 vé ngẫu nhiên
            $pcId = $faker->randomElement($phongChieux);
            $row = $faker->randomElement($rows);
            $seatNumber = sprintf('%02d', $faker->numberBetween(1, 10));
            $gheId = $row . $seatNumber;

            DB::table('ve')->insert([
                'user_id' => $faker->numberBetween(1, 5), // Giả sử có 10 users
                'idLC' => $faker->numberBetween(1, 2),   // Giả sử có 5 lịch chiếu
              'PC_id' => array_search($pcId, $phongChieux) + 1, // Chuyển PC_id thành số
                'idG' => $gheId,
                'giaVe' => $faker->randomElement([75000, 90000, 120000]),
                'trangThai' => $faker->randomElement([ 'Đã thanh toán']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
