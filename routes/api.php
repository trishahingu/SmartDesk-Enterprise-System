<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;

use App\Http\Controllers\API\TaskApiController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\AIApiController;

/*
|--------------------------------------------------------------------------
| Simple Test Route
|--------------------------------------------------------------------------
*/

Route::get('/tasks-list', function () {
    return Task::all();
});

/*
|--------------------------------------------------------------------------
| Projects API
|--------------------------------------------------------------------------
*/

Route::get('/projects', [ProjectApiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Comments API
|--------------------------------------------------------------------------
*/

Route::get('/comments', [CommentApiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| AI API
|--------------------------------------------------------------------------
*/

Route::post('/ai', [AIApiController::class, 'generate']);

/*
|--------------------------------------------------------------------------
| Task API V1
|--------------------------------------------------------------------------
*/

Route::get('/tasks', [TaskApiController::class, 'index']);
Route::post('/tasks', [TaskApiController::class, 'store']);
Route::get('/tasks/{id}', [TaskApiController::class, 'show']);
Route::put('/tasks/{id}', [TaskApiController::class, 'update']);
Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Task API V2
|--------------------------------------------------------------------------
*/

Route::prefix('v2')->group(function () {

    Route::get('/tasks', [TaskApiController::class, 'index']);

    Route::post('/tasks', [TaskApiController::class, 'store']);

    Route::get('/tasks/{id}', [TaskApiController::class, 'show']);

    Route::put('/tasks/{id}', [TaskApiController::class, 'update']);

    Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy']);

});