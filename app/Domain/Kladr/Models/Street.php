<?php

namespace Domain\Kladr\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $table = 'street';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];
}
