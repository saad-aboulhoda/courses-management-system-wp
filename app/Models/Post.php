<?php

namespace App\Models;

use App\Events\CourseCreated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{

    use HasFactory;

    protected $dispatchesEvents = [
        'created' => CourseCreated::class
    ];

    protected $table = 'posts';
    protected $primaryKey = 'ID';
    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';

    public function meta(): HasMany
    {
        return $this->hasMany(PostMeta::class, foreignKey: 'post_id');
    }

    public function taxonomies(): BelongsToMany
    {
        return $this->belongsToMany(TermTaxonomy::class, 'term_relationships', 'object_id', 'term_taxonomy_id');
    }

    public function metaValue($key)
    {
        return $this->meta->metaValue($key);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Post::class, 'post_parent');
    }

    public function scopeWithLessons(Builder $query): void
    {
        $query->with('lessons.course');
    }

    public function scopeWithMeta(Builder $query): void
    {
        $query->with('meta');
    }

    public function scopeWithTaxonomies(Builder $query): void
    {
        $query->with('taxonomies.term');
    }

    public function scopeWithChildren(Builder $query): void
    {
        $query->with('children');
    }

    public function scopeWithEssentials(Builder $query): void
    {
        $query->withLessons()->withMeta()->withTaxonomies()->withChildren();
    }

    public function thumbnail(): Attribute
    {
        return Attribute::get(fn() => get_the_post_thumbnail_url($this->ID));
    }

}
