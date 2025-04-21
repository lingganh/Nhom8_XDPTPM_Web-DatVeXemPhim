<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Ve;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Component
{
    use WithPagination, WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $birthday;
    public $address;
    public $img; // Đổi thành $img để khớp với view
    public $avatarUrl;

    protected $listeners = ['profileUpdated' => '$refresh'];

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->birthday = $user->birthday;
        $this->address = $user->address;
        $this->avatarUrl = $user->img;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),            'phone' => 'nullable|string|max:20',
            'birthday' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'img' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        if ($this->img) {
            $filename = 'avatar-' . Auth::id() . '-' . time() . '.' . $this->img->getClientOriginalExtension(); // Đổi thành $this->img
            $path = $this->img->storeAs('avatars', $filename, 'public'); // Đổi thành $this->img

            // Xóa ảnh cũ nếu có
            if ($user->img && Storage::disk('public')->exists($user->img)) {
                Storage::disk('public')->delete($user->img);
            }
            $user->img = 'avatars/' . $filename;
            $this->avatarUrl = Storage::url('avatars/' . $filename);
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->birthday = $this->birthday;
        $user->address = $this->address;

        $user->save();

        $this->reset('img');
        $this->dispatch('profileUpdated');
        $this->user = Auth::user()->fresh();
        return redirect()->route('user.profile');
    }

    public function render()
    {
        $user = Auth::user();
        $ves = Ve::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('livewire.user-profile', compact('user', 'ves'))
            ->extends('layouts.app')
            ->section('content');
    }
}
