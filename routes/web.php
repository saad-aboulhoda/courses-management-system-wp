<?php

/**
 * Application routes.
 */

use App\Http\Controllers\LessonController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;


Route::get('courses/{slug}/lessons/{lesson:slug}', [LessonController::class, 'show']);

Route::get('archive', [CourseController::class, 'index']);

Route::get('singular', ['courses', 'uses' => 'App\Http\Controllers\CourseController@show']);

Route::get('front', [HomeController::class, 'index']);