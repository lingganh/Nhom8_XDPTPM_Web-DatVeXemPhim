<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Carbon\Carbon;
class moviesController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('client.movies.index', compact('films'));
    }

    public function detail($M_id)
    {
        $film = Film::with('lichChieu')->find($M_id);

        if (!$film) {
            abort(404);
        }

        $today = Carbon::today();
        $endDate = $today->copy()->addDays(6);

        //dd([
           // 'Today' => $today->toDateString(),
            //'EndDate' => $endDate->toDateString(),
         //   'All Lịch Chiếu' => $film->lichChieu->pluck('ngayChieu'),
        //]);

        // Lấy lịch chiếu trong 7 ngày
        $lichChieuTrong7Ngay = $film->lichChieu->filter(function ($lich) use ($today, $endDate) {
            $ngay = Carbon::parse($lich->ngayChieu);
            return $ngay->between($today, $endDate);
        });

        // Mặc định null
        $statusMessage = null;

        // Nếu phim sắp chiếu => luôn hiện thông báo
        if ($film->trangThai == 'Sắp chiếu') {
            $statusMessage = "Phim này hiện chưa có lịch chiếu.";
            $lichChieuTrong7Ngay = collect(); // không cần hiện lịch
        }

        // Nếu phim đang chiếu nhưng không có lịch
        if ($film->trangThai == 'Đang chiếu' && $lichChieuTrong7Ngay->isEmpty()) {
            $statusMessage = "Phim này hiện chưa có lịch chiếu.";
        }

        $ngayList = $lichChieuTrong7Ngay
            ->pluck('ngayChieu')
            ->unique()
            ->sort()
            ->map(function ($ngay) {
                return Carbon::parse($ngay)->format('d/m');
            });

        $lichChieu = $lichChieuTrong7Ngay
            ->sortBy('gioBD')
            ->groupBy(function ($item) {
                return Carbon::parse($item->ngayChieu)->format('d/m');
            })
            ->map(function ($group) {
                return [
                    'Sáng' => $group->filter(function ($item) {
                        $hour = Carbon::parse($item->gioBD)->hour;
                        return $hour >= 5 && $hour < 12;
                    }),
                    'Chiều' => $group->filter(function ($item) {
                        $hour = Carbon::parse($item->gioBD)->hour;
                        return $hour >= 12 && $hour < 18;
                    }),
                    'Tối' => $group->filter(function ($item) {
                        $hour = Carbon::parse($item->gioBD)->hour;
                        return $hour >= 18 && $hour < 24;
                    }),
                ];
            });

        return view('client.movies.show', compact('film', 'lichChieu', 'ngayList', 'statusMessage'));
    }


}
