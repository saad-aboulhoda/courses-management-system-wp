<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($slug, Lesson $lesson) {
        $lesson->load(['course']);
        $lessons = Lesson::with('course')->where('course_id', $lesson->course->ID)->get();
        $next = $lessons->keyBy('lesson_number')[$lesson->lesson_number + 1]->link ?? null;
        $previous = $lessons->keyBy('lesson_number')[$lesson->lesson_number - 1]->link ?? null;
        return view('pages.lesson', compact('lesson', 'lessons', 'next', 'previous'));
    }
}
