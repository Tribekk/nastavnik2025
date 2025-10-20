<tbody class="datatable-body">
@foreach($participants as $index => $item)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $participants->firstItem() + $index }}
        </td>

        <td>
            <div class="min-w-200px text-break">{{ $item->user->fullName }}</div>
        </td>

        <td>
            <div class="min-w-120px text-break">{{ optional($item->user->kladr)->name ?? 'Не указан' }}</div>
        </td>

        <td>
            <div class="min-w-120px">{!! optional($item->user->school)->short_title ?? 'Не указана' !!}</div>
        </td>

        <td>
            <div class="">
                @if($item->user->class)
                    {{ $item->user->class->number }}{{ $item->user->class->letter }}
                @else
                    Не указан
                @endif
            </div>
        </td>

        <td>
            <div class="text-break min-w-120px max-w-120px">
                @if($item->user->phone)
                    <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $item->user->phone }}')">{{ $item->user->phone }}</div>
                @else
                    <i class="la la-minus text-muted"></i>
                @endif
            </div>
        </td>

        <td class="">
            <div class="text-break min-w-200px max-w-200px">
                @if($item->user->email)
                    <a target="_blank" class="link cursor-pointer" href="mailto:{{$item->user->email}}">{{ $item->user->email }}</a>
                @else
                    <i class="la la-minus text-muted"></i>
                @endif
            </div>
        </td>

        <td>


            <div class="min-w-225px">
                <div class="text-nowrap mb-2">
                    @if($item->visited)
                        Посетил мероприятие
                    @else
                        Не посетил
                    @endif
                </div>
                <div class="text-left">
                    @if($item->visited)
                        <form action="{{ route('employer.events.participants.state', $item) }}" method="post" class="mt-2">
                            @csrf
                            @method('put')
                            <button onclick="return confirm('Вы действительно хотите изменить данные?')" class="btn btn-success min-w-225px" title="{{ __('Не посетил мероприятие') }}">
                                <span class="svg-icon svg-icon-md"><i class="la la-eye-slash"></i></span> Не посетил мероприятие
                            </button>
                            <input type="text" name="visited" value="0" hidden>
                        </form>
                    @else
                        <form action="{{ route('employer.events.participants.state', $item) }}" method="post" class="">
                            @csrf
                            @method('put')
                            <button onclick="return confirm('Вы действительно хотите изменить данные?')" class="btn btn-success min-w-225px" title="{{ __('Посетил мероприятие') }}">
                                <span class="svg-icon svg-icon-md"><i class="la la-eye"></i></span> Посетил мероприятие
                            </button>
                            <input type="text" name="visited" value="1" hidden>
                        </form>
                    @endif
                </div>
            </div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->created_at->format('d.m.Y') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->updated_at->format('d.m.Y') }}</div>
        </td>

    </tr>
@endforeach
</tbody>
