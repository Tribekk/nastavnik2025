<?php

namespace Domain\School\Rules;

use Domain\Admin\Models\ClassProfile;
use Illuminate\Contracts\Validation\Rule;

class RequiredArbitraryProfileTitleRule implements Rule
{
    protected ClassProfile $profile;

    public function __construct($profileId)
    {
        $this->profile = ClassProfile::findOrFail($profileId);
    }

    public function passes($attribute, $value)
    {
        return $this->profile->arbitrary_title ? (!empty($value) && mb_strlen(strval($value))) : true;
    }

    public function message()
    {
        return __('Поле «профиль структурного подразделения» является обязательным');
    }
}
