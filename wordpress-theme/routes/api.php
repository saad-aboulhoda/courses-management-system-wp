<?php

use App\Http\Controllers\Api\LessonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('lessons', LessonController::class)->only(['store', 'update', 'destroy']);
Route::get('lessons/course/{courseId}', [LessonController::class, 'findByCourse']);

