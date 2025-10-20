<?php

namespace Domain\Consultation\Actions;

use Domain\Consultation\Models\Consultation;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class CreateConsultationAction
{
    public function run(User $user, array $data): ?Consultation
    {
        return Consultation::create([
            'uuid' => Str::uuid(),
            'parent_id' => $data['parent_id'] ?? null,
            'child_id' => $data['child_id'],
            'consultant_id' => $data['consultant_id'],
            'appointment_id' => $data['appointment_id'],
            'with_child' => $data['with_child'] ?? false,
            'personal_communication_parent' => $data['personal_communication_parent'] ?? false,
            'personal_communication_child' => $data['personal_communication_child'] ?? false,
            'separation_during_consultation' => $data['separation_during_consultation'] ?? false,
            'wishes_and_questions' => $data['wishes_and_questions'] ?? null,
            'communication_type' => $data['communication_type'],
        ]);
    }
}
