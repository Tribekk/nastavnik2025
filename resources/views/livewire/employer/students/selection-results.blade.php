<div>
    <x-inputs.checkbox name="student__proposed_admission_{{$row->id}}"
                       id="student__proposed_admission_{{$row->id}}"
                       model="student.proposed_admission"
                       label="Прошел тестирование, кейсы и анкету"/>

    <x-inputs.checkbox name="student__applied_admission_{{$row->id}}"
                       id="student__applied_admission_{{$row->id}}"
                       model="student.applied_admission"
                       label="Назначено обучение"/>

    <x-inputs.checkbox name="student__enrolled_profile_uz_{{$row->id}}"
                       id="student__enrolled_profile_uz_{{$row->id}}"
                       model="student.enrolled_profile_uz"
                       label="Прошел обучение"/>

    <x-inputs.checkbox name="student__concluded_target_agreement_{{$row->id}}"
                       id="student__concluded_target_agreement_{{$row->id}}"
                       model="student.concluded_target_agreement"
                       label="Присвоен статус наставника"/>
</div>
