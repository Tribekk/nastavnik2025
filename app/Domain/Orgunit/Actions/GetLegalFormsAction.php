<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\LegalForm;

class GetLegalFormsAction
{
    public function run(string $q = null, bool $transform = false, array $filters = null)
    {
        $query = LegalForm::query();

        if ($transform) {
            $query->select(['id', 'title as text']);
            $query->enabled();

            if($q) {
                $query
                    ->where('title', 'like', '%' . $q . '%');
            }
        }

        if ($q && !$transform) {
            $query
                ->where('title', 'like', '%' . $q . '%')
                ->orWhere('short_title', 'like', '%' . $q . '%');
        }

        if(!empty($filters['title'])) {
            $query->where('title', 'like', "%".$filters['title']."%");
        }

        if(!empty($filters['short_title'])) {
            $query->where('short_title', 'like', "%".$filters['short_title']."%");
        }

        if(!empty($filters['user_code'])) {
            $query->where('user_code', 'like', "%".$filters['user_code']."%");
        }

        if(!empty($filters['code'])) {
            $query->where('code', 'like', "%".$filters['code']."%");
        }

        return $query->paginate();
    }
}
