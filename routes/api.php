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
| Version 1 APIs
|--------------------------------------------------------------------------
*/

// Projects
Route::get('/projects', [ProjectApiController::class, 'index']);

// Comments
Route::get('/comments', [CommentApiController::class, 'index']);

// AI
Route::post('/ai', [AIApiController::class, 'generate']);

// Tasks
Route::get('/tasks', [TaskApiController::class, 'index']);
Route::post('/tasks', [TaskApiController::class, 'store']);
Route::get('/tasks/{id}', [TaskApiController::class, 'show']);
Route::put('/tasks/{id}', [TaskApiController::class, 'update']);
Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
| Version 2 APIs
|--------------------------------------------------------------------------
|
| Reusing existing controllers while exposing versioned endpoints.
| This satisfies API versioning without duplicating controller logic.
|
*/

Route::prefix('v2')->group(function () {

    // Projects
    Route::get('/projects', [ProjectApiController::class, 'index']);

    // Comments
    Route::get('/comments', [CommentApiController::class, 'index']);

    // AI
    Route::post('/ai/generate', [AIApiController::class, 'generate']);

    // Tasks
    Route::get('/tasks', [TaskApiController::class, 'index']);
    Route::post('/tasks', [TaskApiController::class, 'store']);
    Route::get('/tasks/{id}', [TaskApiController::class, 'show']);
    Route::put('/tasks/{id}', [TaskApiController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy']);

});