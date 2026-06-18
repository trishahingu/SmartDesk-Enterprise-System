<?php

namespace App\Http\Controllers;

use App\Models\Task;

class AiController extends Controller
{
    public function index()
    {
       $tasks = Task::all();

        foreach ($tasks as $task) {

            $daysLeft = now()->diffInDays(
                $task->deadline,
                false
            );

            // AI Priority

            if ($daysLeft <= 2) {

                $task->ai_priority = 'High';

                $task->risk = 'High';

                $task->recommendation =
                    'Complete immediately and assign more team members.';
            }

            elseif ($daysLeft <= 7) {

                $task->ai_priority = 'Medium';

                $task->risk = 'Medium';

                $task->recommendation =
                    'Monitor progress closely.';
            }

            else {

                $task->ai_priority = 'Low';

                $task->risk = 'Low';

                $task->recommendation =
                    'Task is on track.';
            }
        }

        return view(
            'ai.index',
            compact('tasks')
        );
    }
}