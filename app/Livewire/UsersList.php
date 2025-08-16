<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $query = '';

    #[On('user-created')]

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('livewire.placeholders.skeleton-list');
    }
    public function render()
    {
        // sleep(2);
        return view('livewire.users-list', [
            'title' => 'Users Halaman',
            'users' => User::latest()->
                where('name', 'like', '%' . $this->query . '%')->paginate(6)
        ]);

    }
}
