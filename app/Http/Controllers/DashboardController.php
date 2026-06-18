<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Task;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
       public function index()
{
    $company = null;

    $totalEmployees = \App\Models\Employee::count();
    $totalUsers = \App\Models\User::count();
    $totalTasks = \App\Models\Task::count();
    $totalProjects = \App\Models\Project::count();

    $completedTasks = \App\Models\Task::where(
        'status',
        'Completed'
    )->count();

    $progress = $totalTasks > 0
        ? ($completedTasks / $totalTasks) * 100
        : 0;

    $presentToday = \App\Models\Attendance::where(
        'status',
        'Present'
    )->whereDate(
        'attendance_date',
        today()
    )->count();

    $absentToday = \App\Models\Attendance::where(
        'status',
        'Absent'
    )->whereDate(
        'attendance_date',
        today()
    )->count();

    $halfDayToday = \App\Models\Attendance::where(
        'status',
        'Half-Day'
    )->whereDate(
        'attendance_date',
        today()
    )->count();

    $totalAttendance = \App\Models\Attendance::count();

    if (auth()->check() && auth()->user()->company_id) {
        $company = \App\Models\Company::find(
            auth()->user()->company_id
        );
    }

    return view('dashboard', compact(
        'company',
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
    ));
}
    }
