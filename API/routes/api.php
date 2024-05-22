<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1/')->group(function () {
    Route::controller(TaskController::class)->group(function () {
        Route::post('create', 'createTask');
        Route::post('update', 'updateTask');
        Route::post('updateLocationTask', 'updateLocationTask');
        Route::delete('delete/{id}', 'deleteTask');
        Route::get('All', 'AllProduct');
    });
});
