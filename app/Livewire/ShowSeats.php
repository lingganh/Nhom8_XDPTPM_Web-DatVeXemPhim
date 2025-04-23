<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Ghe;
use App\Models\LichChieu;
use App\Models\Ve;
use Livewire\Component;

 class ShowSeats extends Component
{
    public $lichChieuId;
    public $lichChieu;
    public $phongChieu;
    public $gheDaDat = [];
    public $allSeats   ;
    public $selectedSeats = [];

    public function mount($lich_chieu_id)
    {
        $this->lichChieuId = $lich_chieu_id;
        $this->loadSeatData();
        $this->selectedSeats = session('selected_seats', []);
    }

    public function loadSeatData()
    {
        $this->lichChieu = LichChieu::findOrFail($this->lichChieuId);
        $this->phongChieu = $this->lichChieu->phongChieu;
        $this->gheDaDat = Ve::where('idLC', $this->lichChieuId)->pluck('idG')->toArray();
        $this->allSeats = Ghe::where('PC_id', $this->phongChieu->PC_id)->get();
    }

     public function processSeatSelection($selectedSeatsFromJs)
    {
         session(['lich_chieu_id' => $this->lichChieuId]);
        session(['selected_seats' => $selectedSeatsFromJs]);

         return redirect()->route('booking.select-food');
    }

    public function render()
    {
        return view('livewire.show-seats')->extends('layouts.app')->section('content');
    }
}
