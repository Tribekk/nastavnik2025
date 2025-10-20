<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Support\Model;

class UserSettingType extends Model
{
    protected $guarded = [
        'id'
    ];

    public function setting()
    {
        return $this->belongsTo(UserSetting::class, "id", "type_id");
    }
}
