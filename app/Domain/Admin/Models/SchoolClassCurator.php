<?php

namespace Domain\Admin\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolClassCurator extends Model
{
    protected $guarded = ['id'];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, "school_id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "curator_id");
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, "class_id");
    }
}
