<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowTasks extends Component
{
    public $count ;
    public $open ;
    public $inProgress;
    public $inReview;
    public $accepted;
    public $rejected;
    public $pending;

    public function mount()
    {
    // Get the current user
    $user = Auth::user();

    // Retrieve tasks for the current user
    $tasks = Task::where('owner_id', $user->id)
        ->orWhere('assignee_id', $user->id)
        ->get();

    // Count tasks based on their status and store the counts in variables
    $this->count = $tasks->count();
    $this->open = $tasks->where('status', 'Open')->count();
    $this->inProgress = $tasks->where('status', 'In Progress')->count();
    $this->inReview = $tasks->where('status', 'In Review')->count();
    $this->pending = $tasks->where('status', 'Pending')->count();
    $this->accepted = $tasks->where('status', 'Accepted')->count();
    $this->rejected = $tasks->where('status', 'Rejected')->count();

    }

    public function render()
    {
        return view('livewire.show-tasks');
    }
}
