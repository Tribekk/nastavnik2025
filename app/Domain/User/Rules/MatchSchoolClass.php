<?php

namespace Domain\User\Rules;

use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Illuminate\Contracts\Validation\Rule;

class MatchSchoolClass implements Rule
{
    protected $schoolId;

    public function __construct($schoolId)
    {
        $this->schoolId = $schoolId;
    }

    public function passes($attribute, $value)
    {
        if(empty($this->schoolId) || !$this->schoolId && !$value) return true;
        $school = School::find($this->schoolId);

        $class = SchoolClass::where('school_id', $school->id)->where('id', $value)->first();
        return !empty($class);
    }

    public function message()
    {
        return __('«Структурное подразделение» не найден или данный структурное подразделение не существует у выбранной компании');
    }
}
