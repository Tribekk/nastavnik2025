<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\ExternalOrgunit;
use Illuminate\Support\Facades\Storage;

class DeleteExternalOrgunitLogoAction
{
    public function run(ExternalOrgunit $orgunit)
    {
        if($orgunit->logo) {
            Storage::disk($orgunit->logo->disk)->delete($orgunit->logo->filename);
            $orgunit->logo()->delete();
        }
    }
}

