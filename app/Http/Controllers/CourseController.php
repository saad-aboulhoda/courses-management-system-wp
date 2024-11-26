<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{

    public function index(): View
    {
        $courses = Post::getCourses();
        return view('course.index', compact('courses'));
    }

    public function show($post): View
    {
        $course = Post::fromPost($post);
        return view('course.show', compact('course'));
    }
}
