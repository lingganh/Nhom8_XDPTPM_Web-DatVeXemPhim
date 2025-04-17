<?php

namespace App\Http\Controllers\Backend;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\LichChieu;
class movieShowtimeController
{

    public function __construct()
    {

    }

    public function index(){
        $lichchieu = LichChieu::with('phim')->orderBy('ngayChieu', 'desc')->paginate(10);
        return view('backend.moviveShowtime.index', compact('lichchieu'));


    }
    public function create()
    {
        $phims = Film::all(['M_id', 'tenPhim', 'thoiLuong']);
        return view('backend.moviveShowtime.create', compact('phims'));

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
            'ngayChieu' => $request->ngayChieu,
            'gioBD' => $request->gioBD,
           // 'thoiLuong' => $request->thoiLuong,
        ]);

        return redirect()->route('backend.moviveShowtime.index')->with('success', 'Tạo lịch chiếu thành công!');
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
        return view('backend.moviveShowtime.edit', compact('lich', 'phims'));
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

        return redirect()->route('backend.moviveShowtime.index')->with('success', 'Cập nhật lịch chiếu thành công!');
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
        $phims = $phims->paginate(12);
        return view('backend.moviveShowtime.movie_index', compact('phims'));
    }
}
