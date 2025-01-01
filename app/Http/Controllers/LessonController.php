<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($slug, Lesson $lesson) {
        return view('pages.lesson', compact('lesson'));
    }
}
