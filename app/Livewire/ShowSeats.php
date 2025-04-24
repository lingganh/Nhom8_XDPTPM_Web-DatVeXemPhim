<?php

namespace App\Livewire;

use App\Models\Ghe;
use App\Models\LichChieu;
use App\Models\Ve;
use Livewire\Component;

class ShowSeats extends Component
{
    public $lichChieuId;
    public LichChieu $lichChieu;
    public $phongChieu;
    public array $gheDaDat = [];
    public $allSeats;
    public array $selectedSeats = [];

    public function mount(int $lich_chieu_id): void
    {
        $this->lichChieuId = $lich_chieu_id;
        $this->loadSeatData();
        $this->selectedSeats = session('selected_seats', []);
    }

    public function loadSeatData(): void
    {
        $this->lichChieu = LichChieu::findOrFail($this->lichChieuId);
        $this->phongChieu = $this->lichChieu->phongChieu;
        $this->gheDaDat = Ve::where('idLC', $this->lichChieuId)->pluck('idG')->toArray();
        $this->allSeats = Ghe::where('PC_id', $this->phongChieu->PC_id)->get();
    }

    public function processSeatSelection(array $selectedSeatsFromJs): \Illuminate\Http\RedirectResponse
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
