<?php

namespace App\Livewire;

use App\Mail\OrderConfirmation;
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
        $customerId = auth()->id(); // Assuming user is logged in
        $selectedFood = session('selected_food'); // Lấy thông tin đồ ăn từ session

        // Tạo hóa đơn
        $this->hoaDon = HoaDon::create([
            'idHD' => Str::uuid(), // Generate a UUID for idHD
            'idKH' => $customerId,
            'tongTien' => $tongTien,
            'NgayXuat' => now(),
        ]);

        $lichChieu = LichChieu::findOrFail($lichChieuId);
        $phongChieuId = $lichChieu->PC_id;

        foreach ($selectedSeats as $seatId) {
            $ticketCode = Str::random(10);
            $ve = Ve::create([
                'idHD' => $this->hoaDon->idHD,
                'idLC' => $lichChieuId,
                'PC_id' => $phongChieuId,
                'idG' => $seatId,
                'ticket_code' => $ticketCode,
            ]);
            $this->tickets[] = $ve; // Store the Ve model
        }

        // Lưu thông tin vào bảng ct_hoa_don
        if ($selectedFood) {
            foreach ($selectedFood as $productId => $quantity) {
                $sanPham = SanPham::findOrFail($productId);
                CT_HoaDon::create([
                    'idHD' => $this->hoaDon->idHD,
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
        return view('livewire.payment-success', [
            'hoaDon' => $this->hoaDon,
            'tickets' => $this->tickets,
        ])->extends('layouts.app')->section('content');
    }
}
