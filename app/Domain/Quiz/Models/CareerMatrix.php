<?php

declare(strict_types=1);

namespace Domain\Quiz\Models;

use Support\Model;

class CareerMatrix extends Model
{
    public function activityObject()
    {
        return $this->belongsTo(ActivityObject::class, 'activity_object_id');
    }

    public function activityKind()
    {
        return $this->belongsTo(ActivityKind::class, 'activity_kind_id');
    }
}
