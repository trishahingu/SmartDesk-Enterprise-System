<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Notifications\TaskAssignedNotification;

class TaskController extends Controller
{
    /**
     * Display task list
     */
    public function index(Request $request)
{
    $query = Task::query();

    // Search by title

    if ($request->search) {

        $query->where('title', 'LIKE', '%' . $request->search . '%');
    }

    // Filter by status

    if ($request->status) {

        $query->where('status', $request->status);
    }

    // Filter by priority

    if ($request->priority) {

        $query->where('priority', $request->priority);
    }

    $tasks = $query->get();

    return view('tasks.index', compact('tasks'));
}

    /**
     * Show create form
     */
    public function create()
    {
        $projects = Project::all();

        $users = User::all();

        return view('tasks.create', compact('projects', 'users'));
    }

    /**
     * Store new task
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',

            'description' => 'required',

            'project_id' => 'required',

            'assigned_to' => 'required',

            'status' => 'required',

            'priority' => 'required',

            'deadline' => 'required',

            'attachment' => 'nullable|mimes:pdf,docx,jpg,jpeg,png,zip|max:2048'

        ]);

        // File Upload

        if ($request->hasFile('attachment')) {

            $file = $request->file('attachment');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $attachment = $filename;

        } else {

            $attachment = null;
        }

        // Create Task

        $task = Task::create([

            'title' => $request->title,

            'description' => $request->description,

            'project_id' => $request->project_id,

            'assigned_to' => $request->assigned_to,

            'status' => $request->status,

            'priority' => $request->priority,

            'deadline' => $request->deadline,

            'attachment' => $attachment

        ]);

        // Send Notification

        $user = User::find($request->assigned_to);

        if ($user) {

            $user->notify(new TaskAssignedNotification($task));
        }

        return redirect()->route('tasks.index')
                         ->with('success', 'Task Created Successfully');
    }

    /**
     * Show edit form
     */
    public function edit(Task $task)
    {
        $projects = Project::all();

        $users = User::all();

        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    /**
     * Update task
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([

            'title' => 'required',

            'description' => 'required',

            'project_id' => 'required',

            'assigned_to' => 'required',

            'status' => 'required',

            'priority' => 'required',

            'deadline' => 'required'

        ]);

        // File Upload

        if ($request->hasFile('attachment')) {

            $file = $request->file('attachment');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $task->attachment = $filename;
        }

        // Update Task

        $task->update([

            'title' => $request->title,

            'description' => $request->description,

            'project_id' => $request->project_id,

            'assigned_to' => $request->assigned_to,

            'status' => $request->status,

            'priority' => $request->priority,

            'deadline' => $request->deadline

        ]);

        return redirect()->route('tasks.index')
                         ->with('success', 'Task Updated Successfully');
    }

    /**
     * Delete task
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task Deleted Successfully');
    }
}