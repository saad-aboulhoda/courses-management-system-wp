<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\View\View;

class TaxController extends Controller
{
    public function index($_, $query): View
    {
        $name = $query->queried_object->name;
        $taxonomy = $query->queried_object->taxonomy;
        $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => true]);
        $courses = Course::fromArray($query->posts);
        return view('pages.tax', compact('courses', 'name', 'taxonomy', 'terms'));
    }
}
