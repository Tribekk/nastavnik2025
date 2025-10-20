<?php

namespace Domain\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassProfile extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'arbitrary_title' => 'boolean',
     ];

    public function classes(): HasMany
    {
        return $this->hasMany(SchoolClass::class, "profile_id");
    }
}
