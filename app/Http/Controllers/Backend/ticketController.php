<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ve;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Film;


class ticketController
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $query = $request->query('query');
        $date = $request->query('date');

        $tickets = Ve::query()->with(['user', 'lichChieu.phim']);

        if ($query) {
            $tickets->where('idVe', 'like', '%' . $query . '%')
                ->orWhereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('lichChieu.phim', function ($q) use ($query) {
                    $q->where('tenPhim', 'like', '%' . $query . '%');
                })

             ;
        }

        if ($date) {
            $tickets->whereDate('created_at', $date);
        }

        $tickets = $tickets->get();

        return view('backend.ticket.index', compact('tickets'));
    }
}
