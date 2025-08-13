<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    public function createUser()
    {
        User::create([
            'name' => 'Akmal',
            'email' => 'akmal@example.com',
            'password' => Hash::make('password'),
        ]);
    }
    // public $title = 'Users Halaman';
    public function render()
    {
        return view('livewire.users' , [
            'title' => 'Users Halaman',
            'users' => User::all()
        ]);
    }
}
