<?php

namespace Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property BelongsTo type
 */
class ProfessionalTypeImage extends Model
{
    protected $casts = [
        'active' => 'boolean',
    ];

    public function type()
    {
        return $this->belongsTo(ProfessionalType::class, 'type_id');
    }
}
