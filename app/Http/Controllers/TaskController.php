<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskAssignedMail;
use App\Jobs\SendTaskAssignedEmail;
use App\Services\TaskService;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display task list
     */
    public function show(Task $task)
{
    $task->load(['comments.user']);

    return view('tasks.show', compact('task'));
}
 
    public function index()
{
    $tasks = $this->taskService->getTasks(
        auth()->user()->company_id
    );

    return view('tasks.index', compact('tasks'));
}

    /**
     * Show create form
     */

    public function create()
    {
    $projects = Project::where(
    'company_id',
    auth()->user()->company_id
)->get();

$users = User::where(
    'company_id',
    auth()->user()->company_id
)->get();
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
    $attachment = null;

    if ($request->hasFile('attachment')) {
        $attachment = $request->file('attachment')
            ->store('attachments', 'public');
    }

    $this->taskService->createTask([
        'title' => $request->title,
        'description' => $request->description,
        'project_id' => $request->project_id,
        'assigned_to' => $request->assigned_to,
        'status' => $request->status,
        'priority' => $request->priority,
        'deadline' => $request->deadline,
        'attachment' => $attachment,
    ], auth()->user()->company_id);

    return redirect('/tasks')
        ->with('success', 'Task Created Successfully');
}

    /**
     * Edit task
     */

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        $projects = Project::where(
    'company_id',
    auth()->user()->company_id
)->get();

$users = User::where(
    'company_id',
    auth()->user()->company_id
)->get();
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

    $this->taskService->updateTask(
        $task,
        $request->only([
            'title',
            'description',
            'project_id',
            'assigned_to',
            'status',
            'priority',
            'deadline'
        ])
    );

    return redirect('/tasks')
        ->with('success', 'Task Updated Successfully');
}
    /**
     * Delete task
     */

 public function destroy($id)
{
    $task = Task::findOrFail($id);

    $this->taskService->deleteTask($task);

    return redirect('/tasks')
        ->with('success', 'Task Deleted Successfully');
}
}