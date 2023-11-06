<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TaskAssignedNotification;
use App\Notifications\TaskInReviewNotification;

class TasksController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:Open,Pending,In Progress,In Review',
            'tags' => 'array', // Ensure that 'tags' is an array
        ]);

        // Create a new task with the validated data
        $task = new Task();
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->status = $validatedData['status'];

        // Set the owner_id to the ID of the currently authenticated user
        $task->owner_id = Auth::id();

        // Save the task to the database
        $task->save();

        // Attach the selected tags to the task
        if ($request->has('tags')) {
            $task->tags()->sync($request->input('tags'));
        }

        // Redirect to the user's dashboard with a success message
        return redirect()->route('user.dashboard', ['id' => Auth::id()])->with('success', 'Task created successfully');
    }


    //Delete task
    public function destroy(Task $task)
    {
        // Ensure that the currently authenticated user is the owner of the task
        if (Auth::id() !== $task->owner_id) {
            return redirect()->route('user.dashboard', ['id' => Auth::id()])
                ->with('error', 'You do not have permission to delete this task.');
        }
        else{
            $task->delete();
            return redirect()->route('user.dashboard', ['id' => Auth::id()])
                ->with('success', 'Task deleted successfully');
        }

        // Delete the task
        $task->delete();

        // Redirect to the user's dashboard with a success message
        return redirect()->route('user.dashboard', ['id' => Auth::id()])
            ->with('success', 'Task deleted successfully');
    }

    //Open Edit View
   public function edit($id, $taskID)
    {
        $task = Task::find($taskID);
        $allTags = Tag::all();

        return view('edit', compact('task', 'allTags'));
    }

    //Update Task
    public function update(Request $request, Task $task)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'status' => 'required|in:Open,Pending,In Progress,In Review',
        ]);

        // Check if the currently authenticated user is the owner of the task
        if (Auth::id() === $task->owner_id) {
            // If the condition is met, allow to update the title and description
            $validatedData += $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
            ]);
        }

        if ($task->isDirty('status') && $task->status === 'In Review') {
            // Get the admin user who created the task
            $admin = User::find($task->owner_id);

            if ($admin->user_type === 'admin') {
                // Send the notification email to the admin
                Mail::to($admin->email)->send(new TaskInReviewNotification($task));
            } elseif ($admin->user_type === 'normal') {
                // Get the user to whom the task is assigned
                $assignedUser = User::find($task->assigned_to);
                if ($assignedUser->user_type === 'normal') {
                    // Send the notification email to the assigned user
                    Mail::to($assignedUser->email)->send(new TaskAssignedNotification($task));
                }
            }

            // Redirect to the user's dashboard with a success message
            return redirect()->route('user.dashboard', ['id' => Auth::id()])->with('success', 'Task updated successfully');
        }

        // Update the task with the validated data
        $task->update($validatedData);

        // Handle tag updates
        if ($request->has('tags')) {
            $task->tags()->sync($request->input('tags'));
        } else {
            // If no tags are selected, detach all existing tags
            $task->tags()->detach();
        }
        return redirect()->route('user.dashboard', ['id' => Auth::id()])->with('success', 'Task updated successfully');
    }

    //Dashboard Search
    public function search(Request $request)
    {
        $searchQuery = $request->input('q');

        $tasks = Task::where('title', 'LIKE', "%$searchQuery%")
                    ->orWhere('description', 'LIKE', "%$searchQuery%")
                    ->orWhere('status', 'LIKE', "%$searchQuery%")
                    ->orWhere('tags', 'LIKE', "%$searchQuery%")
                    ->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }



}
