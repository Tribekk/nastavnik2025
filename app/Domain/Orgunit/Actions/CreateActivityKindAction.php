<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\ExternalOrgunitActivityKind;
use Illuminate\Support\Str;

class CreateActivityKindAction
{
    public function run(array $data = []): ?ExternalOrgunitActivityKind
    {
        $data['disabled_at'] = $data['disabled'] == "true" ? now() : null;

        return ExternalOrgunitActivityKind::create([
            'uuid' => $data['uuid'] ?? Str::uuid(),
            'title' => $data['title'],
            'short_title' => $data['short_title'] ?? null,
            'disabled_at' => $data['disabled_at'],
        ]);
    }
}

