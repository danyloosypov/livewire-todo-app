<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $message;

    public function closeModal()
    {
        $this->dispatch('closeModalEvent');
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
