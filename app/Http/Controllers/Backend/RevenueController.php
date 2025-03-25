<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Database\Seeders\HoaDonSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HoaDon; // Nhớ import đúng model
use App\Models\statistic;

class RevenueController extends Controller
{
    public function __construct()
    {

    }
    public function filter_by_date(Request $request)
    {
        $data = $request->all(); // Lấy tất cả dữ liệu từ request

        $from_date = $data['from_date']; // Lấy giá trị từ ngày
        $to_date = $data['to_date']; // Lấy giá trị đến ngày

        // Lấy dữ liệu từ bảng statistics theo khoảng thời gian
        $get = Statistic::whereBetween('Ngaydat', [$from_date, $to_date])
            ->orderBy('Ngaydat', 'ASC')
            ->get();

        // Tạo mảng dữ liệu để gửi về AJAX
        $chart_data = [];

        foreach ($get as $key => $val) {
            $chart_data[] = [
                'Ngaydat'   => $val->Ngaydat,
                'Tongdon'    => $val->Tongdon,
                'Doanhso'    => $val->Doanhso,
                'Lai'   => $val->Lai,
                'Soluongdaban' => $val->Soluongdaban
            ];
        }

        // Trả về dữ liệu JSON cho frontend
        return response()->json($chart_data);
    }


    public function index()
    {


            $data = DB::table('ct_hoa_don')
                ->join('san_pham', 'ct_hoa_don.idsp', '=', 'san_pham.idsp') // Liên kết với bảng sản phẩm
                ->select('san_pham.tenSP', DB::raw('SUM(ct_hoa_don.SL * ct_hoa_don.donGia) as total_revenue'))
                ->groupBy('san_pham.tenSP')
                ->get();

            $labels = $data->pluck('tenSP'); // Lấy danh sách tên sản phẩm
            $values = $data->pluck('total_revenue'); // Lấy tổng doanh thu theo sản phẩm

            return view('backend.revenue.index', compact('labels', 'values'));
        }
    }

