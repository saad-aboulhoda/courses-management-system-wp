<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Taxonomy;

class Taxonomies extends Hookable
{

    const taxonomies = [
        'frameworks' =>
            [
                'postType' => PostTypes::COURSES,
                'plural' => 'Frameworks',
                'singular' => 'Framework',
                'args' => [
                    'hierarchical' => true,
                ]
            ],
        'languages' =>
            [
                'postType' => PostTypes::COURSES,
                'plural' => 'Languages',
                'singular' => 'Language',
                'args' => [
                    'hierarchical' => true,
                ]
            ],
    ];

    public function register(): void
    {
        foreach (static::taxonomies as $slug => $value) {
            Taxonomy::make(slug: $slug, objects: $value['postType'], plural: $value['plural'], singular: $value['singular'])
                ->setArguments($value['args'])
                ->set();
        }
    }
}
