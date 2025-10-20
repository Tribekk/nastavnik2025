<?php

namespace Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Support\Model;

/**
 * @property int id
 * @property string uuid
 * @property int trait_result_id
 * @property int trait_id
 * @property string title
 * @property bool is_higher
 * @property int percentage
 * @property int chart_percentage
 * @property string text
 * @property int reliability
 * @property CharacterTrait trait
 * @property CharacterTraitResult traitResult
 */
class CharacterTraitResultValue extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'trait_result_id',
        'trait_id',
        'title',
        'is_higher',
        'percentage',
        'chart_percentage',
        'description',
    ];

    public function trait(): BelongsTo
    {
        return $this->belongsTo(CharacterTrait::class, "trait_id");
    }

    public function traitResult(): BelongsTo
    {
        return $this->belongsTo(CharacterTraitResult::class, "trait_result_id");
    }
}
