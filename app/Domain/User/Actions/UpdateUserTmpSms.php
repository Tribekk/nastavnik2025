<?php

namespace Domain\User\Actions;

use Illuminate\Support\Facades\DB;
class UpdateUserTmpSms
{
    public function run(array $data): bool
    {
        $tmp_sms = $data['tmp_sms'] ? $data['tmp_sms'] : '';

        return DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['tmp_sms' => $tmp_sms]);
    }

}
