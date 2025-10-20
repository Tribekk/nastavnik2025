<?php

declare(strict_types=1);

namespace Domain\Quiz\Models;

use Domain\Quiz\Traits\SelectableImages;
use Support\Model;

class ActivityKind extends Model
{
    use SelectableImages;

    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }

    public function images()
    {
        return $this->morphMany(ActivityImage::class, 'activable');
    }
}
