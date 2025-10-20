<?php

namespace Domain\Admin\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolClass extends Model
{
    protected $guarded = ['id'];

    protected $appends = [
        'profileTitle',
    ];

    protected $casts = [
        'students_count' => 'int',
        'year' => 'int',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, "school_id");
    }

    public function curators()
    {
        return $this->hasMany(SchoolClassCurator::class, "class_id");
    }

    public function students()
    {
        return $this->hasMany(User::class, "class_id");
    }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(ClassProfile::class, "profile_id");
    }

    public function getProfileTitleAttribute(): string
    {
        if(empty($this->profile)) return '';

        if($this->profile->arbitrary_title) {
            return $this->arbitrary_profile_title ?? '';
        }

        return $this->profile->title ?? '';
    }
}
