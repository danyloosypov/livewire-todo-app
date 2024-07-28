<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoComponent extends Component
{
    use WithPagination;

    public $newToDoName;
    public $searchParam;
    public $editingTodoId;
    public $editedName;
    public $showErrorModal = false;

    protected $listeners = ['closeModalEvent' => 'closeModal'];

    public function createNewTodo()
    {
        $validated = $this->validate([
            'newToDoName' => 'required|min:3|max:100',
        ]);

        Todo::create([
            'name' => $validated['newToDoName']
        ]);

        $this->reset('newToDoName');

        session()->flash('success', 'todo is created');

        $this->resetPage();
    }

    public function editTodoName($id)
    {
        $todo = Todo::find($id);
        if ($todo)
        {
            $this->editingTodoId = $id;
            $this->editedName = $todo->name;
        } else {
            session()->flash('error', 'There is no such Todo');
            $this->showErrorModal = true;
        }
       
    }

    public function saveEditedTodo($id)
    {
        $todo = Todo::find($id);

        if ($todo)
        {
            $todo->update([
                'name' => $this->editedName,
            ]);

            $this->reset(['editingTodoId', 'editedName']);

            session()->flash('success', 'Todo updated');
        } else {
            session()->flash('error', 'There is no such Todo');
            $this->showErrorModal = true;
        }
    }

    public function cancelEditedTodo()
    {
        $this->reset(['editingTodoId', 'editedName']);
    }

    public function toggleIsCompleted($id)
    {
        $todo = Todo::find($id);

        if ($todo)
        {
            $todo->update([
                'is_completed' => !$todo->is_completed,
            ]);
        } else {
            session()->flash('error', 'There is no such Todo');
            $this->showErrorModal = true;
        }
    }

    public function deleteTodo($id)
    {
        $todo = Todo::find($id);

        if ($todo)
        {
            $todo->delete();
        } else {
            session()->flash('error', 'There is no such Todo');
            $this->showErrorModal = true;
        }
    }

    public function closeModal()
    {
        $this->showErrorModal = false;
    }

    public function render()
    {
        $todos = Todo::latest()->where('name', 'like', '%' . $this->searchParam . '%')
            ->paginate(2);

        return view('livewire.todo-component', [
            'todos' => $todos,
        ]);
    }
}
