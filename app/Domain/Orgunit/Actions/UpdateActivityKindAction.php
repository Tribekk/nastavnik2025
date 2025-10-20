<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\ExternalOrgunitActivityKind;

class UpdateActivityKindAction
{
    public function run(ExternalOrgunitActivityKind $activityKind, array $data = []): bool
    {
        $data['disabled_at'] = null;
        if($data['disabled'] == "true") {
            $data['disabled_at'] = $activityKind->disabled_at ? $activityKind->disabled_at : now();
        }

        return $activityKind->update([
            'title' => $data['title'],
            'short_title' => $data['short_title'] ?? null,
            'disabled_at' => $data['disabled_at'],
        ]);
    }
}

