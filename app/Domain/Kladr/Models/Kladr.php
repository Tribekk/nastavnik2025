<?php

namespace Domain\Kladr\Models;

use Illuminate\Database\Eloquent\Model;

class Kladr extends Model
{
    protected $table = "kladr";

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];
}
