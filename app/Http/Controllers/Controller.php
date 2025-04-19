<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller
{
    //
    public function __construct()
    {

    }

    public function show()
    {
        $phims = DB::table('phim')
            ->whereIn('trangThai', ['Đang chiếu', 'Sắp chiếu'])
            ->get();
        return view('client.home.index', compact('phims')); // Truyền dữ liệu vào view
    }
}
