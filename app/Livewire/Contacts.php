<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use Livewire\Component;

class Contacts extends Component
{
    public ContactForm $form;
     public function createNewContact()
    {

        $this->form->save();

        $this->dispatch('contact-created');
    }
    public function render()
    {
        return view('livewire.contacts');
    }
}
