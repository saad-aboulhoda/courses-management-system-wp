<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\URL;

class Course extends Post
{
    const COURSES_PER_PAGE = 6;
    const TOTAL_COURSES_IN_HOME_PAGE = 6;

    const POST_TYPE = 'courses';

    const DESCRIPTION_KEY = 'th_description';
    const INSTRUCTOR_KEY = 'th_instructor';
    const DIFFICULTY_KEY = 'th_difficulty';
    const TOTAL_HOURS_KEY = 'th_total_hours';

    public static function booted(): void
    {
        self::addGlobalScope('post_type', fn(Builder $builder) => $builder
            ->where('post_status', 'publish')
            ->where('post_type', self::POST_TYPE));
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
    public function description(): Attribute
    {
        return Attribute::get(fn($value) => $this->metaValue(self::DESCRIPTION_KEY));
    }

    public function instructor(): Attribute
    {
        return Attribute::get(fn() => $this->metaValue(self::INSTRUCTOR_KEY));
    }

    public function difficulty(): Attribute
    {
        return Attribute::get(fn() => $this->metaValue(self::DIFFICULTY_KEY));

    }

    public function totalHours(): Attribute
    {
        return Attribute::get(fn() => $this->metaValue(self::TOTAL_HOURS_KEY));
    }

    public function link(): Attribute
    {
        return Attribute::get(fn() => URL::to("{$this->post_type}/{$this->post_name}"));
    }

    public function firstLesson(): Attribute
    {
        return Attribute::get(fn() => $this->lessons->first());
    }

    public static function fromPost($post): Post
    {
        return self::withEssentials()->find($post->ID);
    }

    public static function fromArray($array): array
    {
        $items = [];
        foreach ($array as $item) {
            $items[] = static::fromPost($item);
        }
        return $items;
    }

    public static function getPaginatedCourses(int $numberPerPage)
    {
        return self::courses()->paginate($numberPerPage);
    }

    public static function findById($id): Post
    {
        return self::where('id', $id)->first();
    }

    public function terms(): Attribute
    {
        return Attribute::get(function () {
            $terms = [];
            foreach ($this->taxonomies as $taxonomy) {
                $terms[] = [
                    'name' => $taxonomy->term->name,
                    'link' => URL::to("{$taxonomy->taxonomy}/{$taxonomy->term->slug}")
                ];
            }
            return $terms;
        });
    }
}