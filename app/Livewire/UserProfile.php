<?php

namespace App\Livewire;

use Livewire\Component;

class UserProfile extends Component
{
    public function render()
    {
        return view('livewire.user-profile')->extends('layouts.app') ->section('content');
    }
}
