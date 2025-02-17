<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{

    protected $appends = ['count'];
    protected $primaryKey = 'term_id';

    public function count(): Attribute
    {
        return Attribute::get(
            get: fn($value) => $value
        );
    }

    public function link(): Attribute
    {
        return Attribute::get(
            get: fn($value) => $value
        );
    }
}