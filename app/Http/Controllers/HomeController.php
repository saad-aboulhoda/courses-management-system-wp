<?php

namespace App\Http\Controllers;

use App\Events\CourseCreated;
use App\Models\Course;
use App\Models\Post;
use App\Models\TermTaxonomy;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $terms = TermTaxonomy::terms();
        $courses = Course::withEssentials()->latest()->take(6)->get();
        $carousel = $this->getCarousel();
        $testimonials = $this->getTestimonials();
        return view('pages.home', compact('courses', 'carousel', 'terms', 'testimonials'));
    }

    public function getTerms($taxonomies): array
    {
        return get_terms([
            'taxonomy' => $taxonomies,
            'hide_empty' => false, // Include empty terms
        ]);
    }

    private function getCarousel(): array
    {
        $items = [];
        foreach (get_field('carousel') as $item) {
            $items[] = Course::findById($item['course']->ID);
        }
        return $items;
    }

    private function getTestimonials() {
        return get_field('testimonials');
    }
}
