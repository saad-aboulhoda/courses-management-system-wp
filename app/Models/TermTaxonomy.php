<?php

namespace App\Models;

use App\Hooks\Taxonomies;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\URL;

class TermTaxonomy extends Model
{

    protected $table = 'term_taxonomy';
    protected $primaryKey = 'term_taxonomy_id';

    public static function booted(): void
    {
        static::addGlobalScope('tax', fn(Builder $builder) => $builder
            ->whereIn('taxonomy', array_keys(Taxonomies::taxonomies)));
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'term_relationships', 'term_taxonomy_id', 'object_id');
    }

    public function term(): HasOne
    {
        return $this->hasOne(Term::class, 'term_id');
    }

    public static function terms()
    {
        return TermTaxonomy::with('term')->get()->map(function($element) {
            $element->term->count = $element->count;
            $element->term->link = URL::to("{$element->taxonomy}/{$element->term->slug}");
            return $element->term;
        });
    }

}