<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Database\Seeders\HoaDonSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HoaDon; // Nhớ import đúng model
use App\Models\statistic;
use Carbon\Carbon;
class RevenueController extends Controller
{
    public function __construct()
    {

    }
    public function filter_by_date(Request $request)
    {
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];


        $get = Statistic::whereBetween('Ngaydat', [$from_date, $to_date])
            ->orderBy('Ngaydat', 'ASC')
            ->get();



        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'Ngaydat'   => $val->Ngaydat,
                'Tongdon'    => $val->Tongdon,
                'Doanhso'    => $val->Doanhso,
                'Lai'   => $val->Lai,
                'Soluongdaban' => $val->Soluongdaban
            );
            $data =json_encode($chart_data);
        }

    }
    public function days_order(Request $request)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();

        $data = Statistic::whereBetween('Ngaydat', [$sub30days, $now])
            ->orderBy('Ngaydat', 'ASC')
            ->get();

        $chart_data = [];
        foreach ($data as $val) {
            $chart_data[] = array(
                'Ngaydat'   => $val->Ngaydat,
                'Tongdon'    => $val->Tongdon,
                'Doanhso'    => $val->Doanhso,
                'Lai'   => $val->Lai,
                'Soluongdaban' => $val->Soluongdaban
            );
        }

        return response()->json($chart_data);
    }

    public function dashboard_filter(Request $request)
    {
        $data = $request->all();

       //echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
        // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
        // $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(15)->format('d-m-Y H:i:s');
        // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

//        return response()->json([
//            'today' => $today,
//            'dauthangnay' => $dauthangnay,
//            'dau_thangtruoc' => $dau_thangtruoc,
//            'cuoi_thangtruoc' => $cuoi_thangtruoc

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == "7ngay") {
            $get = Statistic::whereBetween('Ngaydat', [$sub7days, $now])->orderBy('Ngaydat', 'ASC')->get();
        } elseif ($data['dashboard_value'] == "thangtruoc") {
            $get = Statistic::whereBetween('Ngaydat', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('Ngaydat', 'ASC')->get();
        } elseif ($data['dashboard_value'] == "thangnay") {
            $get = Statistic::whereBetween('Ngaydat', [$dauthangnay, $now])->orderBy('Ngaydat', 'ASC')->get();
        } else {
            $get = Statistic::whereBetween('Ngaydat', [$sub365days, $now])->orderBy('Ngaydat', 'ASC')->get();
        }

    foreach ($get as $key => $val) {
        $chart_data[] = array(
            'Ngaydat'   => $val->Ngaydat,
            'Tongdon'    => $val->Tongdon,
            'Doanhso'    => $val->Doanhso,
            'Lai'   => $val->Lai,
            'Soluongdaban' => $val->Soluongdaban
        );

    }
        $data =json_encode($chart_data);
    }


    public function index()
    {
        return view('backend.Revenue.index');
    }


//    public function index()
//    {
//
//
//            $data = DB::table('ct_hoa_don')
//                ->join('san_pham', 'ct_hoa_don.idsp', '=', 'san_pham.idsp') // Liên kết với bảng sản phẩm
//                ->select('san_pham.tenSP', DB::raw('SUM(ct_hoa_don.SL * ct_hoa_don.donGia) as total_revenue'))
//                ->groupBy('san_pham.tenSP')
//                ->get();
//
//            $labels = $data->pluck('tenSP'); // Lấy danh sách tên sản phẩm
//            $values = $data->pluck('total_revenue'); // Lấy tổng doanh thu theo sản phẩm
//
//            return view('backend.revenue.index', compact('labels', 'values'));
//        }
   }

