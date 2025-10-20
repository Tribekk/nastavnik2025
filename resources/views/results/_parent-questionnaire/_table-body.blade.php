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
                    <a href="{{ route('quiz.results.parent_questionnaire', $user)."?backTo=".urlencode(url()->full()) }}" class="font-weight-bolder link">
                        {{ $user->fullName }}
                    </a>
                </div>
            </div>
        </td>

        <td>
            @if($user && $user->phone)
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $user->phone }}')">{{ $user->phone }}</div>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td>
            {{ optional($user->school)->short_title ?? 'не указана' }}
        </td>

        <td>
            @if($user->parentQuestionnaireFinished)
                <div class="text-success">Анкета завершена</div>
            @else
                <div class="text-primary">Анкета не завершена</div>
            @endif
        </td>

        <td>
            @if($user->observedUsers && count($user->observedUsers))
                Да
            @else
                Нет
            @endif
        </td>

        <td>
            @if($user->parentQuestionnaireFinished)
                <div class="text-primary mb-0">{{ $user->parentQuestionnaireResult->created_at->format('d.m.Y') }}<br/>{{ $user->parentQuestionnaireResult->created_at->format('H:i:s') }}</div>
            @else
                <div class="text-primary mb-0">-</div>
            @endif
        </td>

        <td class="fit">
            <div class="actions d-flex text-center">
                <a href="{{ route('quiz.results.parent_questionnaire', $user)."?backTo=".urlencode(url()->full()) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 @if(!$user->parentQuestionnaireFinished) disabled @endif" title="{{ __('Просмотр') }}">
                    <span class="svg-icon svg-icon-md"><i class="la la-eye"></i></span>
                </a>
            </div>
        </td>
    </tr>
@endforeach
</tbody>
