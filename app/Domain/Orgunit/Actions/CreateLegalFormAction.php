<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\LegalForm;
use Illuminate\Support\Str;

class CreateLegalFormAction
{
    public function run(array $data = []): ?LegalForm
    {
        $data['disabled_at'] = $data['disabled'] == "true" ? now() : null;

        return LegalForm::create([
            'uuid' => $data['uuid'] ?? Str::uuid(),
            'title' => $data['title'],
            'short_title' => $data['short_title'] ?? null,
            'disabled_at' => $data['disabled_at'],
        ]);
    }
}

