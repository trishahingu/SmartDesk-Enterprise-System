<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskAssignedMail;
class TaskController extends Controller
{
    /**
     * Display task list
     */

    public function index()
    {
        $tasks = Task::latest()->get();

        return view(
            'tasks.index',
            compact('tasks')
        );
    }

    /**
     * Show create form
     */

    public function create()
    {
        $projects = Project::all();

        $users = User::all();

        return view(
            'tasks.create',
            compact(
                'projects',
                'users'
            )
        );
    }

    /**
     * Store new task
     */

    public function store(Request $request)
    {
        $task = Task::create([

            'title' => $request->title,

            'description' => $request->description,

            'project_id' => $request->project_id,

            'assigned_to' => $request->assigned_to,

            'status' => $request->status,

            'priority' => $request->priority,

            'deadline' => $request->deadline,

            'attachment' => $request->hasFile('attachment')
                ? $request->file('attachment')
                    ->store('attachments', 'public')
                : null

                
        ]);
        $user = User::find($request->assigned_to);

Mail::to($user->email)
    ->send(new TaskAssignedMail($task));
        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user_id' => auth()->id(),

            'activity' => 'Created Task: ' . $task->title

        ]);

        return redirect('/tasks')
            ->with('success', 'Task Created Successfully');
    }

    /**
     * Edit task
     */

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        $projects = Project::all();

        $users = User::all();

        return view(
            'tasks.edit',
            compact(
                'task',
                'projects',
                'users'
            )
        );
    }

    /**
     * Update task
     */

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update([

            'title' => $request->title,

            'description' => $request->description,

            'project_id' => $request->project_id,

            'assigned_to' => $request->assigned_to,

            'status' => $request->status,

            'priority' => $request->priority,

            'deadline' => $request->deadline

        ]);

        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user_id' => auth()->id(),

            'activity' => 'Updated Task: ' . $task->title

        ]);

        return redirect('/tasks')
            ->with('success', 'Task Updated Successfully');
    }

    /**
     * Delete task
     */

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([

            'user_id' => auth()->id(),

            'activity' => 'Deleted Task: ' . $task->title

        ]);

        $task->delete();

        return redirect('/tasks')
            ->with('success', 'Task Deleted Successfully');
    }
}