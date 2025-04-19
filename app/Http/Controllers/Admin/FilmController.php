<?php

namespace App\Http\Controllers\Admin;

use App\Models\Film;
use Illuminate\Support\Facades\DB;
 use Illuminate\Http\Request;


class FilmController
{
    public function __construct()
    {

    }


        public function index(Request $request){
            try {
                $query = $request->input('query');

                if ($query) {
                    $phims = Film::where('tenPhim', 'like', '%' . $query . '%')
                        ->orWhere('moTa', 'like', '%' . $query . '%')
                        ->orWhere('thoiLuong', 'like', '%' . $query . '%')
                        ->orWhere('trangThai', 'like', '%' . $query . '%')
                        ->orWhere('M_id', 'like', '%' . $query . '%')
                        ->get();
                    if($phims->isEmpty()){
                        $phims = Film::all();

                    }
                } else {
                    $phims = Film::all();
                }

                return view('admin.film.index', compact('phims'));
            } catch (\Exception $e) {
                // Ghi log lỗi
                return view('admin.film.index')->with('error', 'Đã xảy ra lỗi khi tải danh sách phim.');
            }
        }




    public function getPhimDetails($id)
    {
        $phim = DB::table('phim')->findOrFail($id);
        return response()->json($phim);
    }
    public function update(Request $request, $id)
    {
        $phim = Film::findOrFail($id);
        $data = $request->all();
        $phim->update($data);
        return redirect()->route('films.index ')->with('success', 'Cập nhật phim thành công!');
    }
    public function create (Request $request)
    {
       //  dd(request());
        $data = $request->all();
       // dd($data);
        Film::create($data);
        return redirect()->route('films.index ')->with('success', 'Thêm phim thành công!');
    }
    public function delete ($id)
    {
        //  dd(request());

        // dd($data);

         Film::destroy($id);

        return redirect()->route('films.index ')->with('success', 'Xóa phim thành công!');
    }

}
