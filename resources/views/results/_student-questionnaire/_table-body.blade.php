<tbody class="datatable-body">
@foreach($users as $index => $user)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $users->firstItem() + $index }}
        </td>

        <td>
            <div class="d-flex align-items-center">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="{{ $user->avatarUrl }}">
                </div>
                <div class="ml-4">
                    <a href="{{ route('quiz.results.student_questionnaire', $user)."?backTo=".urlencode(url()->full()) }}" class="font-weight-bolder link">
                        {{ $user->fullName }}
                        @if($user->birth_date)
                            <br>
                            <span class="font-weight-normal">{{ $user->birthDateFormatted }}@if($user->fullYears) ({{ $user->fullYearsFormatted }}) @endif</span>
                        @endif
                    </a>
                </div>
            </div>
        </td>

        <td>
            {{ optional($user->school)->short_title ?? '-' }}, {{ optional($user->class)->number ?? '-' }}{{ optional($user->class)->letter ?? '-' }}
        </td>

        <td>
            <div class="text-primary mb-0">{{ $user->studentQuestionnaireResult->created_at->format('d.m.Y') }}<br/>{{ $user->studentQuestionnaireResult->created_at->format('H:i:s') }}</div>
        </td>

        <td class="fit">
            <div class="actions d-flex text-center">
                <a href="{{ route('quiz.results.student_questionnaire', $user)."?backTo=".urlencode(url()->full()) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="{{ __('Просмотр') }}">
                    <span class="svg-icon svg-icon-md"><i class="la la-eye"></i></span>
                </a>
            </div>
        </td>
    </tr>
@endforeach
</tbody>
