<?php

namespace App\Models;

use App\Support\Collections\PostMetaCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[CollectedBy(PostMetaCollection::class)]
class PostMeta extends Model
{
    protected $table = 'postmeta';

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, foreignKey: 'post_id');
    }

    public function getValueAttribute()
    {
        return $this->meta_value;
    }

    public function newCollection(array $models = []): Collection
    {
        return new PostMetaCollection($models);
    }
}