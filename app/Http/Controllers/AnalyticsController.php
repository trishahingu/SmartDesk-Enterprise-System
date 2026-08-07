<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class AnalyticsController extends Controller
{
    public function index()
    {
        $analytics = Cache::remember('analytics_dashboard', now()->addMinutes(15), function () {

            $totalProjects = Project::count();

            $totalTasks = Task::count();

            $completedTasks = Task::where('status', 'Completed')->count();

            $pendingTasks = Task::where('status', 'Pending')->count();

            $inProgressTasks = Task::where('status', 'In Progress')->count();

            $totalUsers = User::count();

            return compact(
                'totalProjects',
                'totalTasks',
                'completedTasks',
                'pendingTasks',
                'inProgressTasks',
                'totalUsers'
            );
        });

        return view('analytics.index', $analytics);
    }
}