<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public function render()
    {
        $user = Auth()->user();

        return view('livewire.user-profile' ,compact('user'))->extends('layouts.app') ->section('content');
    }
}
