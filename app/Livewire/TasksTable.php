<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TasksTable extends Component
{
    public $tasks;

    public function mount($userId) {
        $this->tasks = Task::where('assignee_id', $userId)
        ->orWhere('owner_id', $userId)
        ->get();
    }


    public function render()
    {
        return view('livewire.tasks-table', [
            'tasks' => $this->tasks,
        ]);
    }
}
