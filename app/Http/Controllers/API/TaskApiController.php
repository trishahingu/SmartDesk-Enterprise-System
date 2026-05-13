<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    // GET ALL TASKS

    public function index()
    {
        $tasks = Task::all();

        return response()->json([

            'success' => true,

            'message' => 'Task List',

            'data' => $tasks

        ]);
    }

    // STORE TASK

    public function store(Request $request)
    {
        $task = Task::create([

            'title' => $request->title,

            'description' => $request->description,

            'project_id' => $request->project_id,

            'assigned_to' => $request->assigned_to,

            'status' => $request->status,

            'priority' => $request->priority,

            'deadline' => $request->deadline

        ]);

        return response()->json([

            'success' => true,

            'message' => 'Task Created',

            'data' => $task

        ]);
    }

    // SHOW SINGLE TASK

    public function show($id)
    {
        $task = Task::find($id);

        return response()->json([

            'success' => true,

            'message' => 'Single Task',

            'data' => $task

        ]);
    }

    // UPDATE TASK

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->update($request->all());

        return response()->json([

            'success' => true,

            'message' => 'Task Updated',

            'data' => $task

        ]);
    }

    // DELETE TASK

    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();

        return response()->json([

            'success' => true,

            'message' => 'Task Deleted'

        ]);
    }
}