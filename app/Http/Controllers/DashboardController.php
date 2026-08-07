<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboardData = Cache::remember('dashboard_stats', now()->addMinutes(10), function () {

            $totalEmployees = Employee::count();
            $totalUsers = User::count();
            $totalTasks = Task::count();
            $totalProjects = Project::count();

            $completedTasks = Task::where('status', 'Completed')->count();

            $progress = $totalTasks > 0
                ? ($completedTasks / $totalTasks) * 100
                : 0;

            $presentToday = Attendance::where('status', 'Present')
                ->whereDate('attendance_date', today())
                ->count();

            $absentToday = Attendance::where('status', 'Absent')
                ->whereDate('attendance_date', today())
                ->count();

            $halfDayToday = Attendance::where('status', 'Half-Day')
                ->whereDate('attendance_date', today())
                ->count();

            $totalAttendance = Attendance::count();

            return compact(
                'totalEmployees',
                'totalUsers',
                'totalTasks',
                'totalProjects',
                'completedTasks',
                'progress',
                'presentToday',
                'absentToday',
                'halfDayToday',
                'totalAttendance'
            );
        });

        $company = null;

        if (auth()->check() && auth()->user()->company_id) {
            $company = Company::find(auth()->user()->company_id);
        }

        return view('dashboard', array_merge(
            ['company' => $company],
            $dashboardData
        ));
    }
}