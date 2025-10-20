<div class="screen @if(!isset($proposedAdmission) && !isset($appliedAdmission) && !isset($enrolledProfileUZ) && !isset($concludedTargetAgreement)) end-screen @endif">
    <div class="content">
        <h2 class="text-blue font-size-h1 font-hero" style="margin-bottom: 30px;">Этапы тестов и консультаций</h2>

        <div class="clearfix"></div>

        <table>
            @isset($studentsCount)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-silver',
                            'title' => 'Списочная численность наставников',
                            'percentage' => $studentsCount['percentage'],
                            'value' => $studentsCount['count'],
                        ])
                    </td>
                </tr>
            @endisset
            @isset($registrationStudentsCount)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                           'color' => 'progress-orange',
                           'title' => 'Зарегистрированы наставники',
                           'percentage' => $registrationStudentsCount['percentage'],
                           'value' => $registrationStudentsCount['count'],
                        ])
                    </td>
                </tr>
            @endisset
            @isset($baseTest)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-orange',
                            'title' => 'Пройден базовый тест',
                            'percentage' => $baseTest['percentage'],
                            'value' => $baseTest['count'],
                        ])
                    </td>
                </tr>
            @endisset
            @isset($participatedEvents)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-orange',
                            'title' => 'Участвовали в мероприятиях',
                            'percentage' => $participatedEvents['percentage'],
                            'value' => $participatedEvents['count'],
                        ])
                    </td>
                </tr>
            @endisset
            @isset($matchedSelectionBaseStep)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-light-green',
                            'title' => 'Соответствует базовому профилю',
                            'percentage' => $matchedSelectionBaseStep['percentage'],
                            'value' => $matchedSelectionBaseStep['count'],
                        ])
                    </td>
                </tr>
            @endisset
            @isset($inviteDepthTest)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-orange',
                            'title' => 'Приглашены на углубленный тест',
                            'percentage' => $inviteDepthTest['percentage'],
                            'value' => $inviteDepthTest['count'],
                        ])
                    </td>
                </tr>
            @endisset
            @isset($depthTest)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-orange',
                            'title' => 'Результаты углубленного теста',
                            'percentage' => $depthTest['percentage'],
                            'value' => $depthTest['count'],
                       ])
                    </td>
                </tr>
            @endisset
            @isset($targetSelectionDepthStep)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-light-green',
                            'title' => 'Соответствуют целевому профилю',
                            'percentage' => $targetSelectionDepthStep['percentage'],
                            'value' => $targetSelectionDepthStep['count'],
                        ])
                    </td>
                </tr>
            @endisset
            @isset($gotConsultation)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar-consultation', [
                            'title' => 'Дети получили консультацию, в том числе с родителями',
                            'percentageChild' => $gotConsultation['percentage_child'],
                            'valueChild' => $gotConsultation['count_child'],
                            'percentageParent' => $gotConsultation['percentage_parent'],
                            'valueParent' => $gotConsultation['count_parent'],
                       ])
                    </td>
                </tr>
            @endisset
            @isset($parentRegistration)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-orange',
                            'title' => 'Зарегистрировано родителей',
                            'percentage' => $parentRegistration['percentage'],
                            'value' => $parentRegistration['count'],
                       ])
                    </td>
                </tr>
            @endisset
            @isset($recommend)
                <tr>
                    <td>
                        @include('employer.reports._students._pdf._progressbar', [
                            'color' => 'progress-green',
                            'title' => 'Рекомендованы',
                            'percentage' => $recommend['percentage'],
                            'value' => $recommend['count'],
                       ])
                    </td>
                </tr>
            @endisset
        </table>

    </div>
</div>
