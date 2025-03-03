<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KHTKSeeder extends Seeder
{
    public function run()
    {
        DB::table('kh_tk')->insert([
            ['KH_id' => 'KH01', 'idTK' => 'TK01'],
            ['KH_id' => 'KH02', 'idTK' => 'TK02'],
        ]);
    }
}
