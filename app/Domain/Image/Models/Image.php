<?php

namespace Domain\Image\Models;

use Support\Model;

class Image extends Model
{
    protected $guarded = ['id'];

    public function imageable()
    {
        return $this->morphTo('imageable');
    }
}
