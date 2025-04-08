<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statistic')->insert([
            [
                'Ngaydat' => '2025-03-20',
                'Doanhso' => 500000,
                'Lai' => 500000,
                'Soluongdaban' => 100,
                'Tongdon' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
