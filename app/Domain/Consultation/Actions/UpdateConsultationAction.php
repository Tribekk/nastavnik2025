<?php

namespace Domain\Consultation\Actions;

use Domain\Consultation\Models\Consultation;
use Domain\Consultation\States\ConsultationState;
use Illuminate\Support\Facades\Log;
use Spatie\ModelStates\Exceptions\CouldNotPerformTransition;

class UpdateConsultationAction
{
    public function run(Consultation $consultation, array $data): bool
    {
        if($data['state']) {
            try {
                if(!$consultation->state->is(ConsultationState::resolveStateClass($data['state']))) {
                    $consultation->transitionTo(ConsultationState::resolveStateClass($data['state']));
                }
            } catch (CouldNotPerformTransition $exception) {
                Log::error($exception->getMessage());
            }
        }

        return $consultation->update([
            'wishes_and_questions' => $data['wishes_and_questions'] ?? $consultation->wishes_and_questions,
            'with_child' => isset($data['with_child']),
            'personal_communication_parent' => isset($data['personal_communication_parent']),
            'personal_communication_child' => isset($data['personal_communication_child']),
            'separation_during_consultation' => isset($data['separation_during_consultation']),
            'communication_type' => $data['communication_type'],
            'communication_type_value' => $data['communication_type_value'],
        ]);
    }
}
