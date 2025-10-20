<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\ExternalOrgunit;

class GetChildrenOrgunitsAction
{
    public function run(ExternalOrgunit $orgunit, string $q = null, bool $transform = false, array $filters = [])
    {
        $childrenIds = $orgunit->parentChildren()->pluck('id');
        $query = ExternalOrgunit::query()->whereIn('id', $childrenIds);

        if ($transform) {
            $query->select(['id', 'title as text']);

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

        if(!empty($filters['legal_form_id'])) {
            $query->where('legal_form_id', '=', $filters['legal_form_id']);
        }

        if(!empty($filters['activity_kind_id'])) {
            $query->whereHas('activityKinds', function ($q) use ($filters) {
                $q->whereIn('activity_kind_id', is_array($filters['activity_kind_id']) ? $filters['activity_kind_id'] : [$filters['activity_kind_id']]);
            });
        }

        if(!empty($filters['parent_id'])) {
            $query->where('parent_id', '=', $filters['parent_id']);
        }

        return $query->paginate();
    }
}
