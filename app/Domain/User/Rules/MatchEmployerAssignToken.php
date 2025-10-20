<?php

namespace Domain\User\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class MatchEmployerAssignToken implements Rule
{
    private $orgunit_id = 0;

    public function __construct($orgunit_id=0)
    {
       $this->orgunit_id = $orgunit_id;
    }

    public function passes($attribute, $value)
    {
        $external_orgunit = DB::table('external_orgunits')->where('id', $this->orgunit_id)->first();

        return strcmp($external_orgunit->code_access, $value) === 0;
    }

    public function message()
    {
        return __('Неверный «Код доступа»');
    }
}
