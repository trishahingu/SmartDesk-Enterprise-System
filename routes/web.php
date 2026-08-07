<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
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
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AiController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\AIApiController;

Route::get('/projects', [ProjectApiController::class, 'index']);
Route::get('/tasks', [TaskApiController::class, 'index']);
Route::get('/comments', [CommentApiController::class, 'index']);
Route::post('/ai', [AIApiController::class, 'generate']);
Route::get('/analytics', [AnalyticsController::class, 'index'])
    ->middleware('auth')
    ->name('analytics.index');
Route::get('/activity', [ActivityController::class, 'index'])
    ->middleware('auth')
    ->name('activity.index');
use App\Http\Controllers\CommentController;
Route::post('/tasks/{task}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

Route::get('/ai', [AIController::class, 'index']);

Route::post('/ai/generate', [AIController::class, 'generate']);
Route::get('/test-log', function () {

    Log::info('SmartDesk monitoring test log generated.');

    return response()->json([
        'message' => 'Log written successfully!'
    ]);
});
Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/success', [PaymentController::class, 'success']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/create', [CompanyController::class, 'create']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/health', function () {
    return response()->json([
        'status' => 'UP',
        'application' => 'SmartDesk',
        'time' => now(),
    ]);
});
/*
|--------------------------------------------------------------------------
| Invoice Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/invoices', [InvoiceController::class, 'index'])
        ->name('invoices.index');

    Route::get('/invoice/pdf/{id}', [InvoiceController::class, 'downloadPdf'])
        ->name('invoice.pdf');

});
Route::get('/subscriptions', [SubscriptionController::class, 'index'])
    ->middleware(['auth'])
    ->name('subscriptions.index');
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
/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
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
    '/subscriptions/upgrade/{plan}',
    [SubscriptionController::class, 'upgrade']
)->middleware(['auth']);
Route::get(
    '/leave-requests/{id}/reject',
    [LeaveRequestController::class, 'reject']
);
Route::get(
    '/activity-logs',
    [ActivityLogController::class, 'index']
);
});
Route::middleware(['auth'])->group(function () {

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/companies/create', [CompanyController::class, 'create']);
    Route::post('/companies', [CompanyController::class, 'store']);

});
Route::middleware(['auth'])->group(function () {

    Route::get(
        '/ai-assistant',
        [AiController::class, 'index']
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