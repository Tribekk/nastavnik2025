<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\ExternalOrgunit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateExternalOrgunitAction
{
    public function run(ExternalOrgunit $orgunit, array $data = [], $block_edit_locations=false)
    {
        DB::transaction(function() use ($orgunit, $data, $block_edit_locations) {

            if($block_edit_locations) {
                $orgunit->update([
                    'title' => $data['title'],
                    'short_title' => $data['short_title'] ?? null,
                    'legal_form_id' => $data['legal_form_id'],
                    'legal_address' => $data['legal_address'],
                    'fact_address' => $data['fact_address'],
                    'landing_template' => $data['landing_template'] ?? 1,
                    'landing_type' => $data['landing_type'] ?? 1,
                    'description' => $data['description'] ?? null,
                    'personal_quiz' => @serialize($data['personal_quiz'])  ?? null,
                    'code_access' => $data['code_access'] ?? null,

                ]);
            } else {
                $orgunit->update([
                    'title' => $data['title'],
                    'short_title' => $data['short_title'] ?? null,
                    'legal_form_id' => $data['legal_form_id'],
                    'activity_kind_id' => $data['activity_kind_id'],
                    'legal_address' => $data['legal_address'],
                    'fact_address' => $data['fact_address'],
                    'description' => $data['description'] ?? null,
                    'landing_template' => $data['landing_template'] ?? 1,
                    'landing_type' => $data['landing_type'] ?? 1,
                    'landing_address' => $data['landing_address'] ?? '',
                    'ftp_access' => $data['ftp_access'] ?? '',
                    'search_location' => @serialize($data['search_location']) ?? null,
                    'personal_quiz' => @serialize($data['personal_quiz']) ?? null,
                    'profile_target' => @serialize($data['profile_target']) ?? null,
                    'code_access' => $data['code_access'] ?? null,
                ]);
            }

            if(isset($data['logo'])) {
                $action = new DeleteExternalOrgunitLogoAction();
                $action->run($orgunit);

                $filename = $data['logo']->store('/'.$orgunit->id, 'external_orgunits');

                $orgunit->logo()->create([
                    'uuid' => Str::uuid(),
                    'filename' => $filename,
                    'disk' => 'external_orgunits',
                ]);
            }

            $orgunit->activityKinds()->delete();
            foreach ($data['activity_kind_id'] as $id) {
                $orgunit->activityKinds()->create([
                    'uuid' => Str::uuid(),
                    'activity_kind_id' => $id
                ]);
            }
        });
    }
}

