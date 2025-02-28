<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\View\View;

class CourseController extends Controller
{

    public function index(): View
    {
        $searchValue = request()->get('q');
        if ($searchValue) {
            $courses = Course::withEssentials()->where('post_title', 'like', "%$searchValue%")->paginate(Course::COURSES_PER_PAGE)->withQueryString();
            return view('pages.search-courses', compact('courses', 'searchValue'));
        }
        $courses = Course::withEssentials()->paginate(Course::COURSES_PER_PAGE);
        return view('pages.courses', compact('courses'));
    }

    public function show($post): View
    {
        $course = Course::withEssentials()->find($post->ID);
        return view('pages.course', compact('course'));
    }

    public function search($value)
    {
        $courses = [];
        $result = Course::WithMeta()->where('post_title', 'like', "%" . $value . "%")->get();
        foreach ($result as $item) {
            $courses[] = [
                'title' => $item->post_title,
                'description' => $item->description,
                'thumbnail' => $item->thumbnail,
                'link' => $item->link
            ];
        }
        return $courses;
    }
}
