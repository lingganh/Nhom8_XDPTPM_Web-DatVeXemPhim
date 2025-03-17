<?php

namespace Database\Seeders;

//use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        DB::table('users')->insert([
           [ 'name' => 'admin',
            'email' => 'admin01@gmail.com',
            'password' =>  bcrypt('admin123')
            ],
            [
                'name' => 'LinhHoang',
                'email' => 'LinhHoang12@gmail.com',
                'password' =>  bcrypt('Lenin')
            ],
            [
                'name' => 'XuLee',
                'email' => 'XuLee01@gmail.com',
                'password' =>  bcrypt('hihi12')
            ],
            [
                'name' => 'RoseTra',
                'email' => 'TraRose8@gmail.com',
                'password' =>  bcrypt('Rose4')
            ],
            [
                'name' => 'TungTung',
                'email' => 'TungNguyen2@gmail.com',
                'password' =>  bcrypt('phutang1')
            ],
            [
                'name' => 'BuiHoa',
                'email' => 'Hoabui82@gmail.com',
                'password' =>  bcrypt('Hoa13')
            ],
        ]);

        $this->call([
            ChucVuSeeder::class,
            CTHoaDonSeeder::class,
            CTPhieuNhapSeeder::class,
            GheSeeder::class,
            HoaDonSeeder::class,
            KHTKSeeder::class,
            KhachHangSeeder::class,
            PhimSeeder::class,
        ]);

    }
}
