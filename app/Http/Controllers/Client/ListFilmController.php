<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use Illuminate\Http\Request;
class ListFilmController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('client.Home.listFilm');
    }
    public function show($id)
    {
        $phim = Phim::findOrFail($id);
        return view('phim.show', compact('phim'));
    }

}
