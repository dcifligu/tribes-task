<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class UpdateTask extends Component
{
    public $taskId;
    public $title;
    public $description;
    public $status;

    public function mount($taskId, $title, $description, $status)
{
    $this->taskId = $taskId;
    $this->title = $title;
    $this->description = $description;
    $this->status = $status;
}

    public function render()
    {
        return view('livewire.update-task');
    }
}
