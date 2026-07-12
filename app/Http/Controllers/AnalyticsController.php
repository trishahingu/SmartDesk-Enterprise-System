<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();

        $totalTasks = Task::count();

        $completedTasks = Task::where('status', 'Completed')->count();

        $pendingTasks = Task::where('status', 'Pending')->count();

        $inProgressTasks = Task::where('status', 'In Progress')->count();

        $totalUsers = User::count();

        return view('analytics.index', compact(
            'totalProjects',
            'totalTasks',
            'completedTasks',
            'pendingTasks',
            'inProgressTasks',
            'totalUsers'
        ));
    }
}