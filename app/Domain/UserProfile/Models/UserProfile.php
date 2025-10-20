<?php

namespace Domain\UserProfile\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //use SoftDeletes;

    protected $fillable = array(

        'title',
        'is_completed',
        'uuid',
    );

    public function anketItems()
    {
        return $this->hasMany(AnketItems::class, 'user_profile_id');
    }

    public function baseTestItems()
    {
        return $this->hasMany(BaseTestItems::class, 'user_profile_id');
    }

    public function deepTestItems()
    {
        return $this->hasMany(DeepTestItems::class, 'user_profile_id');
    }

    public function anketResults()
    {
        return $this->hasMany(AnketResults::class, 'user_profile_id');
    }

    public function deepTestResults()
    {
        return $this->hasMany(DeepTestResults::class, 'user_profile_id');
    }

    public function consultResults()
    {
        return $this->hasMany(ConsultResults::class, 'user_profile_id');
    }

}
