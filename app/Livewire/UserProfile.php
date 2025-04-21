<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Ve;
use Livewire\Component;

class UserProfile extends Component
{
    public function render()
    {
        $user = Auth()->user();
         $ves = Ve::where('user_id',  $user->id)->orderByDesc('created_at')->paginate(10);


        return view('livewire.user-profile' ,compact('user' ,'ves'))->extends('layouts.app') ->section('content');
    }
}
