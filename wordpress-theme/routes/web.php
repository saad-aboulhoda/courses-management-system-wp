<?php

/**
 * Application routes.
 */

use App\Http\Controllers\LessonController;

Route::resource('api/lessons', LessonController::class)->only(['store', 'update', 'destroy']);
Route::get('api/lessons/course/{courseId}', [LessonController::class, 'findByCourse']);

Route::any('courses/{slug}/lessons', function ($slug) {
    $course = \App\Models\Post::where('post_name', $slug)->where('post_type', 'courses')->get()->first();
    $lessons = \App\Models\Lesson::where('course_id', $course->ID)->get();
    dd($lessons);
    return "XDD";
});

Route::any('courses/{slug}/lessons/{lessonSlug}', function ($slug, $lessonSlug) {
    $lesson = \App\Models\Lesson::where('title', $lessonSlug)->get()->first();
    dd($lesson);
    return "XDD";
});

Route::any('front', function ($page, $query) {
    dd($page, $query);
    return view('welcome');
});

Route::any('archive', function ($posts, $query) {
    dd($posts, $query);
});

Route::any('single', function ($post) {
    dd($post);
});

Route::any('page', ['hello-world', function () {
    return "custom hello world page";
}]);

Route::any('page', function ($page, $query) {
    return $page->post_title . $page->post_content;
});