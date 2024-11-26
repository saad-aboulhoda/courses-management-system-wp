<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'ID';
    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function thumbnail()
    {
        return get_the_post_thumbnail_url($this->ID);
    }

    public function description()
    {
        return get_post_meta($this->ID, 'th_description', true);
    }

    public function instructor()
    {
        return get_post_meta($this->ID, 'th_instructor', true);
    }

    public function difficulty()
    {
        return get_post_meta($this->ID, 'th_difficulty', true);
    }

    public function totalHours()
    {
        return get_post_meta($this->ID, 'th_total_hours', true);
    }

    public function link()
    {
        return get_post_permalink($this->ID);
    }

    public static function fromPost($post): Post
    {
        $course = new Post();
        foreach (get_object_vars($post) as $key => $value) {
            $course->$key = $value;
        }
        return $course;
    }

    public static function getCourses()
    {
        return self::where('post_type', 'courses')->where('post_status', 'publish')->get();
    }
}
