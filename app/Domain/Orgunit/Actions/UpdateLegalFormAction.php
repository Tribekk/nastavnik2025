<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\LegalForm;

class UpdateLegalFormAction
{
    public function run(LegalForm $legalForm, array $data = []): bool
    {
        $data['disabled_at'] = null;
        if($data['disabled'] == "true") {
            $data['disabled_at'] = $legalForm->disabled_at ? $legalForm->disabled_at : now();
        }

        return $legalForm->update([
            'title' => $data['title'],
            'short_title' => $data['short_title'] ?? null,
            'disabled_at' => $data['disabled_at'],
        ]);
    }
}

