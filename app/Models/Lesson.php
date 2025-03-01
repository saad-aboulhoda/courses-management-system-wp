<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'google_video_id',
        'course_id'
    ];

    public static function fromSlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function link(): Attribute
    {
        return Attribute::get(fn() => URL::to("courses/{$this->course->post_name}/lessons/{$this->slug}"));
    }

    public function theTitle(): Attribute
    {
        return Attribute::get(fn() => "{$this->lesson_number} - {$this->title}");
    }

    public function createSlug()
    {
        if (!empty($this->slug)) {
            return $this->slug;
        }
        $slug = Str::slug($this->title);
        if (self::where('slug', $slug)->count() <= 0) {
            return $this->slug = $slug;
        }
        $i = 1;
        while (self::where('slug', $slug)->count() > 0) {
            $slug = $slug . '-' . $i;
            if (self::where('slug', $slug)->count() <= 0) {
                return $this->slug = $slug;
            }
            $i++;
        }
        throw new \Exception('Can not create a unique slug.');
    }
}
