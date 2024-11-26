<?php

namespace App\Hooks\PostTypes;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Field;
use Themosis\Support\Facades\Metabox;
use Themosis\Support\Facades\PostType;
use Themosis\Support\Section;

class Courses extends Hookable
{

    private string $slug = 'courses';
    private string $plural = 'Courses';
    private string $singular = 'Course';

    public function register()
    {
        $this->create();
        $this->metaboxes();
    }

    /**
     * Create the custom post type.
     * @return void
     */
    private function create(): void
    {
        PostType::make($this->slug, $this->plural, $this->singular)
            ->setArguments([
                'public' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-welcome-learn-more',
                'supports' => ['title', 'thumbnail'],
                'taxonomies' => ['category'],
            ])
            ->set();
    }

    /**
     * Register the custom post type metaboxes.
     * @return void
     */
    private function metaboxes(): void
    {
        Metabox::make('details', $this->slug)
            ->add(new Section('details', 'Details', [
                Field::text('instructor'),
                Field::text('difficulty'),
                Field::text('total_hours'),
                Field::textarea('description', [
                    'attributes' => [
                        'rows' => 5,
                    ]
                ])
            ]))
            ->set();

        Metabox::make('lessons', $this->slug)
            ->setCallback(function ($args) {
                return view('panel.courses.lessons', compact('args'));
            })
            ->set();
    }
}
