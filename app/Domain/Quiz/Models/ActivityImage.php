<?php

declare(strict_types=1);

namespace Domain\Quiz\Models;

use Support\Model;

class ActivityImage extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'selected' => 'boolean',
    ];

    public function activable()
    {
        return $this->morphTo();
    }

    public function activity()
    {
        return $this->belongsTo($this->activable_type, $this->activable_id);
    }
}
