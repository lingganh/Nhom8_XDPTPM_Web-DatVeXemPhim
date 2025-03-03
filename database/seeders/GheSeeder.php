<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GheSeeder extends Seeder
{
    public function run()
    {
        DB::table('ghe')->insert([
            ['PC_id' => 'PC01', 'idG' => 'G01', 'status' => 'available'],
            ['PC_id' => 'PC01', 'idG' => 'G02', 'status' => 'booked'],
            ['PC_id' => 'PC02', 'idG' => 'G03', 'status' => 'available'],
        ]);
    }
}
