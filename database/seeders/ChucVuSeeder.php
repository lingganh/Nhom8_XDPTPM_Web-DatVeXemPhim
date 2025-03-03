<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    public function run()
    {
        DB::table('chuc_vu')->insert([
            ['idCV' => 'CV01', 'tenCV' => 'Quản lý', 'salary' => 20000000],
            ['idCV' => 'CV02', 'tenCV' => 'Nhân viên', 'salary' => 10000000],
        ]);
    }

}
