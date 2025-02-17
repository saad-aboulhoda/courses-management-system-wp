<?php

namespace App\Support\Collections;

use Illuminate\Database\Eloquent\Collection;

class PostMetaCollection extends Collection
{
    public function metaValue(string $key)
    {
        return $this->keyBy('meta_key')[$key]->value;
    }
}