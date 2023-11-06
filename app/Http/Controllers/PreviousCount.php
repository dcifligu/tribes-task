<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviousCount extends Controller
{
    //Keep track of task number changes (admin panel)
    public function keepTrack(){
    // When a task is created
    $task = new Task();
    $task->save();

    // Update the `previous_counts` table with the new task count
    PreviousCount::updateOrCreate([
        'countable_type' => 'tasks', // You can use a specific identifier for tasks
    ], [
        'count' => Task::count(),
    ]);

    // When a task is deleted
    $taskId = 1; // Replace with the actual task ID
    Task::destroy($taskId);

    // Update the `previous_counts` table with the new task count
    PreviousCount::updateOrCreate([
        'countable_type' => 'tasks', // You can use a specific identifier for tasks
    ], [
        'count' => Task::count(),
    ]);
}
}
