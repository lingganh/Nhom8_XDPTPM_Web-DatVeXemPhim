<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AuthContainer extends Component
{
    public $showLogin = true;

    protected $listeners = ['userRegistered' => 'switchToLogin'];

    public function switchToLogin()
    {
        $this->showLogin = true;
    }

    public function switchToRegister()
    {
        $this->showLogin = false;
    }

    public function render()
    {
        return view('livewire.auth-container');
    }
}
