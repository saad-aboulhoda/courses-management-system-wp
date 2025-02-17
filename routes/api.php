<?php

use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\CourseController;
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

Route::apiResource('lessons', LessonController::class)->only(['store', 'update', 'destroy'])->middleware('wp.can');
Route::get('lessons/course/{courseId}', [LessonController::class, 'findByCourse'])->middleware('wp.can');
Route::get('courses/search/{value}', [CourseController::class, 'search']);
