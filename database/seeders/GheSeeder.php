<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GheSeeder extends Seeder
{
    public function run()
    {
        DB::table('ghe')->delete();
        $phongChieux = ['1', '2', '3'];

        foreach ($phongChieux as $pcId) {
            for ($i = 1; $i <= 5; $i++) { // Tạo 5 hàng ghế (A-E)
                $row = chr(64 + $i); // Chuyển số thành chữ (A, B, C, D, E)
                for ($j = 1; $j <= 10; $j++) { // Tạo 10 ghế mỗi hàng
                    $seatNumber = sprintf('%02d', $j); // Định dạng số ghế thành 01, 02,...
                    $gheId = $row . $seatNumber;
                    DB::table('ghe')->insert([
                        'PC_id' => $pcId,
                        'idG' => $gheId,
                        'status' => 'available',
                    ]);
                }
            }
        }
    }
}
