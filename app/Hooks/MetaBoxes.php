<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Field;
use Themosis\Support\Facades\Metabox;
use Themosis\Support\Section;

class MetaBoxes extends Hookable
{
    public function register(): void
    {
        $this->courses();
    }

    private function courses(): void
    {
        Metabox::make('details', PostTypes::COURSES)
            ->add(new Section('details', 'Details', [
                Field::text('instructor'),
                Field::text('difficulty'),
                Field::text('total_hours'),
                Field::textarea('description', [
                    'attributes' => [
                        'rows' => 5,
                    ]
                ]),
            ]))
            ->set();

        Metabox::make('lessons', PostTypes::COURSES)
            ->setCallback(function ($args) {
                return view('panel.courses.lessons', compact('args'));
            })
            ->set();
    }
}
