<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Support\Model;

class UserSetting extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'settings' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function type()
    {
        return $this->belongsTo(UserSettingType::class, "type_id");
    }
}
