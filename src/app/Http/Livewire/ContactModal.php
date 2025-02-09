<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactModal extends Component
{
    public $showModal = false;
    public $contact;

    protected $listeners = ['openModal', 'closeModal'];

    public function openModal($contact)
    {
        $this->contact = $contact;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.contact-modal');
    }
}

