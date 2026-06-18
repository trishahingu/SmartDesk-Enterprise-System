<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\TaskApiController;
use App\Models\Task;

Route::get('/tasks-list', function () {
    return Task::all();
});
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('v2')->group(function () {

    Route::get('/tasks',
        [TaskApiController::class, 'index']);

    Route::post('/tasks',
        [TaskApiController::class, 'store']);

    Route::get('/tasks/{id}',
        [TaskApiController::class, 'show']);

    Route::put('/tasks/{id}',
        [TaskApiController::class, 'update']);

    Route::delete('/tasks/{id}',
        [TaskApiController::class, 'destroy']);

});

Route::post('/tasks',
    [TaskApiController::class, 'store']);

Route::get('/tasks/{id}',
    [TaskApiController::class, 'show']);

Route::put('/tasks/{id}',
    [TaskApiController::class, 'update']);

Route::delete('/tasks/{id}',
    [TaskApiController::class, 'destroy']);