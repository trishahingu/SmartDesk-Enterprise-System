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

Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/success', [PaymentController::class, 'success']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/create', [CompanyController::class, 'create']);
Route::post('/companies', [CompanyController::class, 'store']);

Route::get(
    '/invoices',
    [InvoiceController::class, 'index']
)->middleware(['auth']);

Route::get(
    '/invoices/generate',
    [InvoiceController::class, 'generate']
)->middleware(['auth']);
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
Route::get(
    '/invoice/pdf/{id}',
    [App\Http\Controllers\InvoiceController::class, 'downloadPdf']
);
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