<?php

namespace Domain\User\Rules;

use Domain\Admin\Models\School;
use Illuminate\Contracts\Validation\Rule;

class MatchSchoolToken implements Rule
{
    protected $schoolId;

    public function __construct($schoolId)
    {
        $this->schoolId = $schoolId;
    }

    public function passes($attribute, $value)
    {
        $school = School::find($this->schoolId);

        return strcmp(optional($school)->token ?? '', $value) === 0;
    }

    public function message()
    {
        return __('Неверный «Код доступа»');
    }
}
