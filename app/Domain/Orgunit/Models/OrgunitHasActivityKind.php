<?php

namespace Domain\Orgunit\Models;

use Domain\UserProfile\Models\UserProfile;
use Support\Model;

class OrgunitHasActivityKind extends Model
{
    protected $guarded = ['id'];

    public function orgunit()
    {
        return $this->belongsTo(ExternalOrgunit::class, "orgunit_id");
    }

    public function activityKind()
    {
        return $this->belongsTo(UserProfile::class, "activity_kind_id");
    }
}
