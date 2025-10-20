<?php

namespace Domain\UserProfile\Models;

use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Eloquent\Model;

class DeepTestItems extends Model
{
    //use SoftDeletes;

    protected $fillable = array(
        'control_values'
    );

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

}
