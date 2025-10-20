<?php

namespace Domain\Orgunit\Models;

use Domain\Event\Models\Event;
use Domain\Image\Models\Image;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Support\CastAttributes\SerializationString;
use Support\HasTreeRelation;
use Support\Model;

class PersonalQuizBall extends Model
{

    protected $guarded = ['id'];


}
