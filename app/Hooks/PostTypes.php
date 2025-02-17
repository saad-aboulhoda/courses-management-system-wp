<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\PostType;
use Themosis\Support\Facades\Taxonomy;

class PostTypes extends Hookable
{

    const COURSES = 'courses';
    private array $postTypes = [
        self::COURSES => [
            'plural' => 'Courses',
            'singular' => 'Course',
            'args' => [
                'public' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-welcome-learn-more',
                'supports' => ['title', 'thumbnail'],
            ]
        ]
    ];

    public function register(): void
    {
        foreach ($this->postTypes as $slug => $value) {
            PostType::make(slug: $slug, plural: $value['plural'], singular: $value['singular'])
                ->setArguments($value['args'])
                ->set();
        }
    }
}
