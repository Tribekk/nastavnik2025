<?php

declare(strict_types=1);

namespace Domain\Quiz\Models;

use Support\Model;

class SuitableProfessionResult extends Model
{
    protected $guarded = ['id'];

    public function careerMatrix()
    {
        return $this->belongsTo(CareerMatrix::class, 'career_matrix_id');
    }
}
