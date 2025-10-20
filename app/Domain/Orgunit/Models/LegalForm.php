<?php

namespace Domain\Orgunit\Models;

use Illuminate\Database\Query\Builder;
use Support\Model;

class LegalForm extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'disabled_at' => 'timestamp',
    ];

    /**
     * Только неиспользуемые
     * @param $query
     * @return Builder $query
     */
    public function scopeDisabled($query)
    {
        return $query->whereNotNull('disabled_at');
    }

    /**
     * Только используемые
     * @param $query
     * @return Builder $query
     */
    public function scopeEnabled($query)
    {
        return $query->whereNull('disabled_at');
    }
}
