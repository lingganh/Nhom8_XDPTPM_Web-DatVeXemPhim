<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\LichChieu;
use App\Models\PhongChieu;
use Illuminate\Pagination\LengthAwarePaginator;
class movieShowtimeController
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $now = \Carbon\Carbon::now();

        $query = LichChieu::with(['phim', 'phongChieu'])->orderBy('ngayChieu', 'desc');

        // Lọc theo tên phim
        if ($request->filled('keyword')) {
            $query->whereHas('phim', function ($q) use ($request) {
                $q->where('tenPhim', 'like', '%' . $request->keyword . '%');
            });
        }

        // Lọc theo ngày chiếu
        if ($request->filled('ngayChieu')) {
            $query->whereDate('ngayChieu', $request->ngayChieu);
        }

        // Lọc theo phòng chiếu
        if ($request->filled('phong')) {
            $query->where('PC_id', $request->phong);
        }

        $lichchieu = $query->get();

        // Gán trạng thái cho mỗi lịch chiếu
        $lichchieu->transform(function ($lich) use ($now) {
            $start = \Carbon\Carbon::parse($lich->gioBD);
            $end = $start->copy()->addMinutes($lich->thoiLuong);

            if ($now->lt($start)) {
                $lich->phan_loai = 'Sắp chiếu';
            } elseif ($now->between($start, $end)) {
                $lich->phan_loai = 'Đang chiếu';
            } else {
                $lich->phan_loai = 'Đã chiếu';
            }

            return $lich;
        });

        // Lọc theo trạng thái sau khi đã gán
        if ($request->filled('trangThai')) {
            $lichchieu = $lichchieu->filter(function ($lich) use ($request) {
                return $lich->phan_loai == $request->trangThai;
            });
        }

        // Phân trang thủ công nếu dùng collection sau filter
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $paged = new \Illuminate\Pagination\LengthAwarePaginator(
            $lichchieu->forPage($currentPage, $perPage),
            $lichchieu->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.moviveShowtime.index', ['lichchieu' => $paged]);
    }



    public function create()
    {
        $phims = Film::all(['M_id', 'tenPhim', 'thoiLuong']);
        $phongs = PhongChieu::all(['PC_id', 'ten_phong']);
        return view('admin.moviveShowtime.create', compact('phims', 'phongs'));


    }
    public function store(Request $request)
    {
        $request->validate([
            'M_id' => 'required|integer|exists:phim,M_id',
            'ngayChieu' => 'required|date',
            'gioBD' => 'required|date_format:H:i',
            //'thoiLuong' => 'required|integer|min:1'
        ]);
        LichChieu::create([
            'M_id' => $request->M_id,
            'PC_id' => $request->PC_id,
            'ngayChieu' => $request->ngayChieu,
            'gioBD' => $request->gioBD,
        ]);

        LichChieu::create([
            'M_id' => $request->M_id,
            'ngayChieu' => $request->ngayChieu,
            'gioBD' => $request->gioBD,
           // 'thoiLuong' => $request->thoiLuong,
        ]);

        return redirect()->route('admin.moviveShowtime.index')->with('success', 'Tạo lịch chiếu thành công!');
    }
    public function destroy($idLC)
    {
        $lich = LichChieu::where('idLC', $idLC)->first();

        if ($lich) {
            $lich->delete();
            return redirect()->back()->with('success', 'Xoá lịch chiếu thành công!');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy lịch chiếu!');
        }
    }
    public function edit($idLC)
    {
        $lich = LichChieu::findOrFail($idLC);
        $phims = Film::all(['M_id', 'tenPhim']);
        $phongs = PhongChieu::all(['PC_id', 'ten_phong']);
        return view('admin.moviveShowtime.edit', compact('lich', 'phims', 'phongs'));
    }

    public function update(Request $request, $idLC)
    {
        $request->validate([
            'M_id' => 'required|integer|exists:phim,M_id',
            'ngayChieu' => 'required|date',
            'gioBD' => 'required|date_format:H:i',

        ]);

        $lich = LichChieu::findOrFail($idLC);
        $lich->update([
            'M_id' => $request->M_id,
            'ngayChieu' => $request->ngayChieu,
            'gioBD' => $request->gioBD,

        ]);

        return redirect()->route('admin.moviveShowtime.index')->with('success', 'Cập nhật lịch chiếu thành công!');
    }

    public function movieIndex(Request $request){

        $phims = Film::query();

        if($request->has('keyword')){
            $phims->where('tenPhim', 'like', '%'.$request->keyword.'%');
        }
        if($request->has('sort')){


            if($request->sort == 'name_z_a'){
                $phims->orderBy('tenPhim', 'desc');
            }
            if($request->sort == 'name_a_z'){
                $phims->orderBy('tenPhim', 'asc');
            }
            if($request->sort == 'time_asc'){

                $phims->orderBy('thoiLuong', 'asc');
            }
            if($request->sort == 'time_desc'){
                $phims->orderBy('thoiLuong', 'desc');
            }
        }
        if($request->has('trangThai')){
            $phims->where('trangThai',$request->trangThai);
        }
        $phims = $phims->paginate(12);
        return view('admin.moviveShowtime.movie_index', compact('phims'));
    }
}
