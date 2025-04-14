<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Film;

class Homepage extends Component
{
    public $phims;
    public $upcomingMovies;
    public $comingSoonMovies;

    public function mount()
    {
        $this->phims = Film::all();
        $this->upcomingMovies = Film::where('trangThai', 'Đang chiếu')->take(4)->get();
        $this->comingSoonMovies = Film::where('trangThai', 'Sắp chiếu')->take(4)->get();
    }

    public function render()
    {
        return view('livewire.homepage')->extends('layouts.app') ->section('content'); ;
        ;
    }
}
