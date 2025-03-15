<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhimSeeder extends Seeder
{
    public function run()
    {
        DB::table('phim')->insert([
            [
                'M_id' => 'F001',
                'tenPhim' => 'Vong Nhi',
                'thoiLuong' => 120,
                'moTa' => 'Một bộ phim hành động gay cấn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'https://simg.zalopay.com.vn/zlp-website/assets/phim_ma_chieu_rap_viet_nam_6_be4211c44f.jpg',
                'Trailer' => 'https://www.youtube.com/embed/COyyFQ6SkGM?si=NNvUkYB6okzoD3pX',
                'imgBanner' => 'https://cdn.dealtoday.vn/phim-ma-kinh-di-chieu-rap_18082023095852.jpg',
            ],
            [
                'M_id' => 'F002',
                'tenPhim' => 'Vong Nhi',
                'thoiLuong' => 120,
                'moTa' => 'Một bộ phim hành động gay cấn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'https://simg.zalopay.com.vn/zlp-website/assets/phim_ma_chieu_rap_viet_nam_6_be4211c44f.jpg',
                'Trailer' => 'https://www.youtube.com/embed/COyyFQ6SkGM?si=NNvUkYB6okzoD3pX',
                'imgBanner' => 'https://cdn.dealtoday.vn/phim-ma-kinh-di-chieu-rap_18082023095852.jpg',
            ],
            [
                'M_id' => 'F003',
                'tenPhim' => 'Vong Nhi',
                'thoiLuong' => 120,
                'moTa' => 'Một bộ phim hành động gay cấn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'https://simg.zalopay.com.vn/zlp-website/assets/phim_ma_chieu_rap_viet_nam_6_be4211c44f.jpg',
                'Trailer' => 'https://www.youtube.com/embed/COyyFQ6SkGM?si=NNvUkYB6okzoD3pX',
                'imgBanner' => 'https://cdn.dealtoday.vn/phim-ma-kinh-di-chieu-rap_18082023095852.jpg',
            ],
            [
                'M_id' => 'F004',
                'tenPhim' => 'Vong Nhi',
                'thoiLuong' => 120,
                'moTa' => 'Một bộ phim hành động gay cấn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'https://simg.zalopay.com.vn/zlp-website/assets/phim_ma_chieu_rap_viet_nam_6_be4211c44f.jpg',
                'Trailer' => ' https://www.youtube.com/embed/COyyFQ6SkGM?si=NNvUkYB6okzoD3pX',
                'imgBanner' => 'https://cdn.dealtoday.vn/phim-ma-kinh-di-chieu-rap_18082023095852.jpg',
            ],
            [
                'M_id' => 'F005',
                'tenPhim' => 'Vong Nhi',
                'thoiLuong' => 120,
                'moTa' => 'Một bộ phim hành động gay cấn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'https://simg.zalopay.com.vn/zlp-website/assets/phim_ma_chieu_rap_viet_nam_6_be4211c44f.jpg',
                'Trailer' => ' https://www.youtube.com/embed/COyyFQ6SkGM?si=NNvUkYB6okzoD3pX',
                'imgBanner' => 'https://cdn.dealtoday.vn/phim-ma-kinh-di-chieu-rap_18082023095852.jpg',
            ],
            [
                'M_id' => 'F006',
                'tenPhim' => 'Vong Nhi',
                'thoiLuong' => 120,
                'moTa' => 'Một bộ phim hành động gay cấn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'https://simg.zalopay.com.vn/zlp-website/assets/phim_ma_chieu_rap_viet_nam_6_be4211c44f.jpg',
                'Trailer' => 'https://www.youtube.com/embed/COyyFQ6SkGM?si=NNvUkYB6okzoD3pX',
                'imgBanner' => 'https://cdn.dealtoday.vn/phim-ma-kinh-di-chieu-rap_18082023095852.jpg',
            ],
            ['M_id' => 'F011',
                'tenPhim' => 'Vong Nhi',
                'thoiLuong' => 120,
                'moTa' => 'Một bộ phim hành động gay cấn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'https://simg.zalopay.com.vn/zlp-website/assets/phim_ma_chieu_rap_viet_nam_6_be4211c44f.jpg',
                'Trailer' => 'https://www.youtube.com/embed/COyyFQ6SkGM?si=NNvUkYB6okzoD3pX',
                'imgBanner' => 'https://cdn.dealtoday.vn/phim-ma-kinh-di-chieu-rap_18082023095852.jpg',
            ],
            [
                'M_id' => 'F008',
                'tenPhim' => 'Phim Võ Thuật 8',
                'thoiLuong' => 125,
                'moTa' => 'Những pha hành động mãn nhãn...',
                'trangThai' => 'Sắp chiếu',
                'Poster' => 'poster8.jpg',
                'Trailer' => 'trailer8.mp4',
                'imgBanner' => 'banner8.jpg',
            ],
            [
                'M_id' => 'F009',
                'tenPhim' => 'Phim Tâm Lý 9',
                'thoiLuong' => 100,
                'moTa' => 'Những diễn biến tâm lý phức tạp...',
                'trangThai' => 'Đã chiếu',
                'Poster' => 'poster9.jpg',
                'Trailer' => 'trailer9.mp4',
                'imgBanner' => 'banner9.jpg',
            ],
            [
                'M_id' => 'F010',
                'tenPhim' => 'Phim Tài Liệu 10',
                'thoiLuong' => 95,
                'moTa' => 'Khám phá những điều bí ẩn...',
                'trangThai' => 'Đang chiếu',
                'Poster' => 'poster10.jpg',
                'Trailer' => 'trailer10.mp4',
                'imgBanner' => 'banner10.jpg',
            ],
        ]);
    }
}
