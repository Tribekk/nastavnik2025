<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;
use Domain\User\Models\UserSettingType;

class GetEmployerDashboardSettingsAction
{
    public function run(User $user)
    {
        $type = UserSettingType::where('code', 'employer-dashboard')->first();
        $settings = $user->settings()->where('type_id', $type->id)->first();

        return collect([
            'students_count' => $settings ? optional($settings->settings)->students_count ?? true : true,
            'registration_students_count' => $settings ? optional($settings->settings)->registration_students_count ?? true : true,
            'questionnaire_students_count' => $settings ? optional($settings->settings)->students_count ?? true : true,
            'cases_questions_students_count' => $settings ? optional($settings->settings)->students_count ?? true : true,
            'model_competence_range_31_to_100' => $settings ? optional($settings->settings)->students_count ?? true : true,
            'base_test' => $settings ? optional($settings->settings)->base_test ?? true : true,
            'participated_events' => $settings ? optional($settings->settings)->participated_events ?? true : true,
            'matched_selection_base_step' => $settings ? optional($settings->settings)->matched_selection_base_step ?? true : true,
            'invite_depth_test' => $settings ? optional($settings->settings)->invite_depth_test ?? true : true,
            'depth_test' => $settings ? optional($settings->settings)->depth_test ?? true : true,
            'target_selection_depth_step' => $settings ? optional($settings->settings)->target_selection_depth_step ?? true : true,
            'got_consultation' => $settings ? optional($settings->settings)->got_consultation ?? true : true,
            'parent_registration' => $settings ? optional($settings->settings)->parent_registration ?? true : true,
            'recommend' => $settings ? optional($settings->settings)->recommend ?? true : true,

            'proposed_admission' => $settings ? optional($settings->settings)->proposed_admission ?? true : true,
            'applied_admission' => $settings ? optional($settings->settings)->applied_admission ?? true : true,
            'enrolled_profile_uz' => $settings ? optional($settings->settings)->enrolled_profile_uz ?? true : true,
            'concluded_target_agreement' => $settings ? optional($settings->settings)->concluded_target_agreement ?? true : true,
        ]);
    }
}
