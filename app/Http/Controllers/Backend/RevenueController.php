<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        // Tính tổng doanh thu từ bảng hóa đơn
        $tongDoanhThu = DB::table('hoa_don')->sum('tongTien');

        // Lấy doanh thu theo ngày
        $doanhThuTheoNgay = DB::table('hoa_don')
            ->select(DB::raw('DATE(NgayXuat) as ngay'), DB::raw('SUM(tongTien) as doanhthu'))
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        // Lấy số vé đã bán theo trạng thái
        $veBanRa = DB::table('ve')
            ->select('trangThai', DB::raw('COUNT(*) as soLuong'))
            ->groupBy('trangThai')
            ->get();

        return view('backend.revenue.index', compact('tongDoanhThu', 'doanhThuTheoNgay', 'veBanRa'));
    }
}

