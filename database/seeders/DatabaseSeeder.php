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
            'email' => 'admin03@gmail.com',
            'password' =>  bcrypt('admin123'),

            ],
            [
                'name' => 'LinhHoang',
                'email' => 'LinhHoang12@gmail.com',
                'password' =>  bcrypt('Lenin'),
                'phone' => '0123456789',
                'address' => 'Số 19, ngách 24/3 Pháo Đài Láng, Phường Láng Thượng, quận Đống Đa, thành phố Hà Nội',
                'birthday' => '5/02/1997',
                'image' => 'https://kenh14cdn.com/203336854389633024/2021/8/26/photo-1-1629954437711142936136.jpg'
            ],
            [
                'name' => 'XuLee',
                'email' => 'XuLee01@gmail.com',
                'password' =>  bcrypt('hihi12'),
                'phone' => '0836274627',
                'address' => 'Thôn sú 2, xã Lâm Động, huyện Thủy Nguyên, thành phố Hải Phòng.',
                'birthday' => '12/05/1996',
                'image' => 'https://media.vov.vn/sites/default/files/styles/large/public/2021-06/199658372_1362526200866778_4453950737481873132_n.jpg'
            ],
            [
                'name' => 'RoseTra',
                'email' => 'TraRose8@gmail.com',
                'password' =>  bcrypt('Rose4'),
                'phone' => '0837392738',
                'address' => '123/3 đường Lê Lợi, phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh',
                'birthday' => '15/05/2000',
                'image' => 'https://media.vov.vn/sites/default/files/styles/large/public/2021-06/202474983_1362526124200119_3779267567734027752_n.jpg'
            ],
            [
                'name' => 'TungTung',
                'email' => 'TungNguyen2@gmail.com',
                'password' =>  bcrypt('phutang1'),
                'phone' => '0893392920',
                'address' => '123/5B đường Lê Lợi, Phường 6, thành phố Tuy Hòa, tỉnh Phú Yên',
                'birthday' => '08/09/2006',
                'image' => 'https://media.vov.vn/sites/default/files/styles/large/public/2021-06/202938514_1362526257533439_7020074321997085281_n.jpg'
            ],
            [
                'name' => 'BuiHoa',
                'email' => 'Hoabui82@gmail.com',
                'password' =>  bcrypt('Hoa13'),
                'phone' => '0987654321',
                'address' => '27 Phan Chu Trinh, Hoàn Kiếm, Hà Nội',
                'birthday' => '28/09/2001',
                'image' => 'https://kenh14cdn.com/2020/3/8/26d7d95dd96c48b98a958a0635257661720-15836467289262010158708.jpg'
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
