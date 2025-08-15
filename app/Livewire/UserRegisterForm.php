<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserRegisterForm extends Component
{
    use WithFileUploads;
     #[Validate('image|max:5120|')] // 1MB Max
    public $avatar;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required')]
    public $password = '';
    public function createNewUser()
    {
        //  $validated = $this->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required',
        // ],[
        //     'name.required' => 'Nama harus diisi',
        //     'name.min' => 'Nama minimal 3 karakter',
        //     'email.required' => 'Email harus diisi',
        //     'email.email' => 'Email tidak valid',
        //     'email.unique' => 'Email sudah terdaftar',
        //     'password.required' => 'Password harus diisi',
        // ]);

        // User::create($validated);

        // User::create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => Hash::make($validated['password']),
        // ]);

        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar']
        ]);

        $this->reset();
        session()->flash('status', 'User berhasil ditambahkan');
         $this->dispatch('user-created');
    }
    public function render()
    {
        return view('livewire.user-register-form');
    }
}
