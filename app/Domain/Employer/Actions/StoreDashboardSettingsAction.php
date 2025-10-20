<?php

namespace Domain\Employer\Actions;

use Domain\User\Models\User;
use Domain\User\Models\UserSetting;
use Domain\User\Models\UserSettingType;
use Illuminate\Support\Str;

class StoreDashboardSettingsAction
{
    public function run(User $user, array $data = [])
    {
        $type = UserSettingType::where('code', 'employer-dashboard')->first();

        $settings = $user->settings()->where('type_id', $type->id)->first();
        $uuid = empty($settings) ? Str::uuid() : $settings->uuid;

        UserSetting::updateOrCreate(
            [
                'user_id' => $user->id,
                'type_id' => $type->id,
            ],
            [
                'uuid' => $uuid,
                'settings' => [
                    'students_count' => isset($data['students_count']),
                    'registration_students_count' => isset($data['registration_students_count']),
                    'base_test' => isset($data['base_test']),
                    'participated_events' => isset($data['participated_events']),
                    'invite_depth_test' => isset($data['invite_depth_test']),
                    'depth_test' => isset($data['depth_test']),
                    'parent_registration' => isset($data['parent_registration']),
                    'got_consultation' => isset($data['got_consultation']),
                    'target_selection_depth_step' => isset($data['target_selection_depth_step']),
                    'matched_selection_base_step' => isset($data['matched_selection_base_step']),
                    'recommend' => isset($data['recommend']),

                    'proposed_admission' => isset($data['proposed_admission']),
                    'applied_admission' => isset($data['applied_admission']),
                    'enrolled_profile_uz' => isset($data['enrolled_profile_uz']),
                    'concluded_target_agreement' => isset($data['concluded_target_agreement']),
                ]
            ]
        );
    }
}
