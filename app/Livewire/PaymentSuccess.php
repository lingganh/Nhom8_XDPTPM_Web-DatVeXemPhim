<?php

namespace App\Livewire;

use App\Models\HoaDon;
use App\Models\LichChieu;
use App\Models\Ve;
use App\Models\SanPham; // Import model SanPham
use App\Models\CT_HoaDon; // Import model CT_HoaDon
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class PaymentSuccess extends Component
{
    public $hoaDon;
    public $tickets = [];

    public function mount()
    {
        $transactionReference = session('vnp_TxnRef');
        $tongTien = session('giaHD');
        $lichChieuId = session('lich_chieu_id');
        $selectedSeats = session('selected_seats');
        $customerId = auth()->id();
        $selectedFood = session('selected_food');

        // Tạo hóa đơn
        $idHD=rand(66,10000);
        $this->hoaDon = HoaDon::create([
            'idHD' => $idHD,
            'idKH' => $customerId,
            'tongTien' => $tongTien,
            'NgayXuat' => now(),
        ]);
        //dd($this->hoaDon->idHD);
        $lichChieu = LichChieu::findOrFail($lichChieuId);
        $phongChieuId = $lichChieu->PC_id;

        foreach ($selectedSeats as $seatId) {
            $ticketCode = Str::random(10);
            $ve = Ve::create([
                'idHD' =>$idHD,
                'idLC' => $lichChieuId,
                'PC_id' => $phongChieuId,
                'idG' => $seatId,
                'ticket_code' => $ticketCode,
                'user_id' => $customerId,
                'trang_thai' =>'Đã thanh toán',
                'giaVe' =>  75000 ,

            ]);
            $this->tickets[] = $ve;
        }

        // Lưu thông tin vào bảng ct_hoa_don
        if ($selectedFood) {
            foreach ($selectedFood as $productId => $quantity) {
                $sanPham = SanPham::findOrFail($productId);
                CT_HoaDon::create([
                    'idHD' => $idHD,
                    'idsp' => $productId,
                    'SL' => $quantity,
                    'donGia' => $sanPham->donGia,
                ]);
            }
        }

       // Mail::to(auth()->user()->email)->send(new OrderConfirmation($this->hoaDon, $this->tickets));
        session()->forget(['lich_chieu_id', 'selected_seats', 'selected_food', 'total_seat_price', 'giaHD', 'vnp_TxnRef']);
    }

    public function render()
    {
        $hoaDon = $this->hoaDon;
        $tickets = Ve::where('idHD', $this->hoaDon->idHD)
            ->with(['lichChieu.phim', 'phongchieu', 'nguoiDung'])
            ->get();

        return view('livewire.payment-success', [
            'hoaDon' => $hoaDon,
            'tickets' => $tickets,
        ])->extends('layouts.app')->section('content');
    }
}
