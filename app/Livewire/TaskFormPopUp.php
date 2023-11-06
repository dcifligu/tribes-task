<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Task;
use Livewire\Component;

class TaskFormPopUp extends Component
{
    public $task;

    public function mount(Task $task = null)
    {
        $this->task = $task;
    }

    public function render()
    {
        $allTags = Tag::all();
        return view('livewire.task-form-pop-up', ['allTags' => $allTags]);
    }
}
