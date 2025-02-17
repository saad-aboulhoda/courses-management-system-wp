<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\SearchController;
use Themosis\Support\Facades\Route;


/**
 * Application routes.
 */

Route::get('search', [SearchController::class, 'index']);
Route::get('tax', [TaxController::class, 'index']);
Route::get('courses/{slug}/lessons/{lesson:slug}', [LessonController::class, 'show']);
Route::get('archive', [CourseController::class, 'index']);
Route::get('singular', ['courses', 'uses' => 'App\Http\Controllers\CourseController@show']);
Route::get('page', ['about-us', 'uses' => 'App\Http\Controllers\AboutController@show']);
Route::get('page', ['contact-us', 'uses' => 'App\Http\Controllers\ContactController@show']);
Route::get('front', [HomeController::class, 'index']);