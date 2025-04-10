<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => bcrypt('password'),
                'address' => null,
                'birthday' => null,
                'image' => null,
                'phone' => null,
                'role'=>1,
            ],
            [
                'email' => 'LinhHoang12@gmail.com',
                'name' => 'LinhHoang',
                'password' => bcrypt('password'),
                'address' => 'Số 19, ngách 24/3 Pháo Đài Láng, Phường Láng Thượng, quận Đống Đa, thành phố Hà Nội',
                'birthday' => '1997-02-05',
                'image' => 'https://kenh14cdn.com/...jpg',
                'phone' => '0123456789',
                'role'=>1,
            ],
            [
                'name' => 'XuLee',
                'email' => 'XuLee01@gmail.com',
                'password' => bcrypt('hihi12'),
                'phone' => '0836274627',
                'address' => 'Thôn sú 2, xã Lâm Động, huyện Thủy Nguyên, thành phố Hải Phòng.',
                'birthday' => '1996-05-12',  // Chỉnh format ngày đúng (YYYY-MM-DD)
                'image' => 'https://kenh14cdn.com/...jpg',
                'role'=>1,
            ],
            [
                'name' => 'RoseTra',
                'email' => 'TraRose8@gmail.com',
                'password' => bcrypt('Rose4'),
                'phone' => '0837392738',
                'address' => '123/3 đường Lê Lợi, phường Bến Nghé, Quận 1, TP HCM',
                'birthday' => '2000-05-15',
                'image' => 'https://kenh14cdn.com/...jpg',
                'role'=>1,
            ],
            [
                'name' => 'TungTung',
                'email' => 'TungNguyen2@gmail.com',
                'password' => bcrypt('phutang1'),
                'phone' => '0893392920',
                'address' => '123/5B đường Lê Lợi, Phường 6, Tuy Hòa, Phú Yên',
                'birthday' => '2006-09-08',
                'image' => 'https://kenh14cdn.com/...jpg',
                'role'=>2,
            ],
            [
                'name' => 'BuiHoa',
                'email' => 'Hoabui82@gmail.com',
                'password' => bcrypt('Hoa13'),
                'phone' => '0987654321',
                'address' => '27 Phan Chu Trinh, Hoàn Kiếm, Hà Nội',
                'birthday' => '2001-09-28',
                'image' => 'https://kenh14cdn.com/...jpg',
                'role'=>2,
            ],
        ]);

        // Gọi các Seeder khác
        $this->call([

            CTHoaDonSeeder::class,
            CTPhieuNhapSeeder::class,
            GheSeeder::class,
            HoaDonSeeder::class,
            StatisticSeeder::class,
            SanPhamSeeder::class,
            PhimSeeder::class,

            PhongChieuSeeder::class,


            LichChieuSeeder::class,

            VeTableSeeder::class,


        ]);
    }
}
