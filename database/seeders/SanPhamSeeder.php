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
             ['idsp' => '1', 'tenSP' => 'Nước','donGia' => 15000 , 'img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLMvi-jRVO2sRx3Xh5kRZwAG3zKJnfoiaHBg&s'],
            ['idsp' => '2', 'tenSP' => 'Bắp Rang','donGia' => 50000,'img'=>'https://pbs.twimg.com/media/CKBAuhHUAAAK6ya.jpg:large'],
            ['idsp' => '3', 'tenSP' => 'Combo Nhỏ','donGia' => 100000,'img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkX6gPetm9Ftz7IFUZmFZ-HfDBXygufLclMIgzWQQHvxHJq3bY1n2Gpm4W3TRw6jiEpSU&usqp=CAU'],
            ['idsp' => '4', 'tenSP' => 'Combo Lớn','donGia' => 150000,'img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRs8semuIKigUQ0M6MgdBpio3VLSHSPbL5uDohmZflVgF80FoUr8mv9gwyW2Difx95bXQ&usqp=CAU'],
        ]);
    }
}
