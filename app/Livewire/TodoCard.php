<?php

namespace App\Livewire;

use Livewire\Component;

class TodoCard extends Component
{
    public $todo;

    public function render()
    {
        return view('livewire.todo-card');
    }
}
