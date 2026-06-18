<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Tasks Retrieved Successfully',
            'data' => Task::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'required',
            'description' => 'required'

        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $task = Task::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Task Created Successfully',
            'data' => $task
        ], 201);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {

            return response()->json([
                'success' => false,
                'message' => 'Task Not Found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $task
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {

            return response()->json([
                'success' => false,
                'message' => 'Task Not Found'
            ], 404);
        }

        $task->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Task Updated Successfully',
            'data' => $task
        ], 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {

            return response()->json([
                'success' => false,
                'message' => 'Task Not Found'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task Deleted Successfully'
        ], 200);
    }
}