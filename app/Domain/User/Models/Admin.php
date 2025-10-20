<?php

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Admin extends Model
{
    /**
     * Пользователь-администратор
     *
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
