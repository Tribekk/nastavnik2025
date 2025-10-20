<?php

namespace Domain\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\CastAttributes\SerializationString;

class School extends Model
{
    protected $guarded = ['id'];


    //protected $fillable = ['local'];

    protected $casts = [
        'title' => SerializationString::class,
        'short_title' => SerializationString::class,
        'local' => SerializationString::class,
    ];

    public function loyaltyLevel(): BelongsTo
    {
        return $this->belongsTo(LoyaltyLevel::class, "loyalty_level_id");
    }

    public function typeEducationOrganization(): BelongsTo
    {
        return $this->belongsTo(TypeEducationalOrganization::class, "type_of_educational_organization_id");
    }

    public function classes(): HasMany
    {
        return $this->hasMany(SchoolClass::class, "school_id")
            ->orderByRaw('number asc, letter asc');
    }

    public static function generateToken(): string
    {
        return numerify(4)."-".numerify(4);
    }
}
