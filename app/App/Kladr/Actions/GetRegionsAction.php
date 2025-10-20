<?php

namespace App\Kladr\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class GetRegionsAction
{
    public function run(string $q = null)
    {
        $sql = DB::select(
            "SELECT * FROM (
                SELECT
                    DISTINCT
                    code as id,
                    CASE
                       WHEN socr = 'обл' THEN CONCAT_WS(' ', `name`, 'Область')
                       WHEN socr = 'респ' THEN CONCAT_WS(' ', 'Республика', `name`)
                       WHEN socr = 'край' THEN CONCAT_WS(' ', `name`, 'Край')
                       WHEN socr = 'АО' THEN CONCAT_WS(' ', `name`, 'Автономный округ')
                       WHEN socr = 'Аобл' THEN CONCAT_WS(' ', `name`, 'Автономная область')
                       ELSE `name`
                   END as text
                FROM kladr WHERE code LIKE '__00000000000') as q WHERE q.text LIKE ?", ["%{$q}%"]);

        $collect = collect($sql);

        return new LengthAwarePaginator(
            $collect->forPage(request('page', 1), request('perPage', 150)),
            $collect->count(),
            request('perPage', 150),
            request('page', 1),
            [
                'path' => route('kladr.regions'),
            ],
        );
    }
}
