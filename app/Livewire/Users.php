<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithFileUploads;
    use WithPagination;

    #[Validate('image|max:5120|')] // 1MB Max
    public $avatar;

     #[Validate('required|min:3')]
    public $name='';

    #[Validate('required|email:dns|unique:users')]
    public $email='';

    #[Validate('required')]
    public $password='';
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
    }
    // public $title = 'Users Halaman';
    public function render()
    {
        return view('livewire.users' , [
            'title' => 'Users Halaman',
            'users' => User::latest()->paginate(6)
        ]);
    }
}
