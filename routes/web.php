<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\EventController;
use App\Models\Employee;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $totalEmployees = \App\Models\Employee::count();

    $totalUsers = \App\Models\User::count();

    $totalTasks = \App\Models\Task::count();
    
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
    $completedTasks = \App\Models\Task::where(
        'status',
        'Completed'
    )->count();

    $progress = $totalTasks > 0
        ? ($completedTasks / $totalTasks) * 100
        : 0;

    $notifications = auth()->user()
        ->notifications;

    return view('dashboard', compact(

        'totalEmployees',
        'totalUsers',
        'totalTasks',
        'completedTasks',
        'progress',
        'notifications',
        'presentToday',
        'absentToday',
        'halfDayToday',
        'totalAttendance'

    ));

})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Project Routes
|--------------------------------------------------------------------------
*/

Route::resource(
    'projects',
    ProjectController::class
);

/*
|--------------------------------------------------------------------------
| Report Routes
|--------------------------------------------------------------------------
*/

Route::get('/tasks/pdf',
    [ReportController::class, 'exportPDF']);

Route::get('/tasks/excel',
    [ReportController::class, 'exportExcel']);

/*
|--------------------------------------------------------------------------
| Task Routes
|--------------------------------------------------------------------------
*/

Route::resource(
    'tasks',
    TaskController::class
);

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/

Route::resource(
    'employees',
    EmployeeController::class
);

/*
|--------------------------------------------------------------------------
| Attendance Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::resource(
        'attendance',
        AttendanceController::class
    );
Route::resource(
    'leave-requests',
    LeaveRequestController::class
);
Route::resource(
    'timesheets',
    TimesheetController::class
);
Route::get(
    '/leave-requests/{id}/approve',
    [LeaveRequestController::class, 'approve']
);
Route::get(
    '/backup/database',
    [BackupController::class, 'backup']
);
Route::resource(
    'events',
    EventController::class
);
Route::get(
    '/leave-requests/{id}/reject',
    [LeaveRequestController::class, 'reject']
);
Route::get(
    '/activity-logs',
    [ActivityLogController::class, 'index']
);
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});

require __DIR__.'/auth.php';