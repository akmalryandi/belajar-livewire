<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Contact;
use Livewire\Attributes\Validate;

class ContactForm extends Form
{

    public $email='';

    public $subject='';

    public $message='';

    public function save() {
        $validated = $this->validate([
            'email' => 'required|email:dns|unique:users',
            'subject' => 'required',
            'message' => 'required',
        ],[
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'subject.required' => 'Subject harus diisi',
            'message.required' => 'Message harus diisi',
        ]);

        Contact::create($validated);

        $this->reset();
        session()->flash('status', 'Contact berhasil ditambahkan');

    }
}
