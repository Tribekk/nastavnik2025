@extends ('layout.page')

@section('subheader')
    <x-subheader title="Приглашения на мероприятие"/>
@endsection

@section ('content')
    <div class="container">
        <x-card>
            <x-slot name="title">{{ $eventInvite->event->title }}</x-slot>
            <x-slot name="toolbar">
                <form action="{{ route('events.invites.destroy', $eventInvite) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="btn btn-danger px-4 py-2 my-1 mr-1"
                        onclick="return confirm('Вы действительно хотите удалить приглашение?')"
                    >
                        Удалить
                    </button>
                </form>
            </x-slot>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Организатор</div>
                            <div class="font-size-h6">{{ $eventInvite->event->orgunit->title }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Формат проведения</div>
                            <div class="font-size-h6">{{ $eventInvite->event->format->title }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Направление</div>
                            @foreach($eventInvite->event->directions as $direction)
                                <div class="font-size-h6">{{ $direction->direction->title }}</div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Статус мероприятия</div>
                            <div class="font-size-h6 mt-2 {{ $eventInvite->eventState->color() }}">{{ $eventInvite->eventState->title() }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Время начала</div>
                            <div class="font-size-h6 mt-2">{{ $eventInvite->event->start_at->format('d.m.Y H:i') }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Время завершения</div>
                            <div class="font-size-h6 mt-2">{{ $eventInvite->event->finish_at->format('d.m.Y H:i') }}</div>
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="font-weight-bold font-size-h5">Аудитория</div>
                        <div class="button-group mt-2">
                            @foreach($eventInvite->event->audience as $item)
                                <div class="btn-secondary btn btn-sm" style="font-size: 14px;">{{ $item->audience->title }}</div>
                            @endforeach
                        </div>
                    </div>

                    @if($eventInvite->event->location)
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Место проведения</div>
                            <div class="font-size-h6">{{ $eventInvite->event->location }}</div>
                        </div>
                    @endif
@php
//dd($eventInvite->event->program);
@endphp
                    @if($eventInvite->event->program)
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Программа мероприятия</div>
                            <div class="">{!! $eventInvite->event->program !!}</div>
                        </div>
                    @endif

                    @if($eventInvite->event->attachedFiles)
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Прикрепленные файлы</div>
                            <div class="mt-3">
                                @foreach($eventInvite->event->attachedFiles as $file)
                                    <a href="{{ route('attached_files.download') }}?path={{ urlencode($file->path) }}" class="font-size-h6 d-inline-block mx-2 link">
                                        <div class="d-inline text-break my-1">{{ $file->onlyFileName }}</div>
                                        <i class="la la-download ml-2"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            @if($eventInvite->state->is(\Domain\Event\States\EventInvite\PendingEventInviteState::class))
                <div class="mt-4 button-group">
                    <form action="{{ route('events.invites.accept', $eventInvite) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('PUT')
                        <button
                            type="submit"
                            class="btn btn-success px-4 py-2 my-1 mr-1"
                            onclick="return confirm('Вы действительно хотите принять приглашение?')"
                        >
                            <i class="la la-check"></i> Подтвердить участие
                        </button>
                    </form>

                    <form action="{{ route('events.invites.cancel', $eventInvite) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('PUT')
                        <button
                            type="submit"
                            class="btn btn-primary px-4 py-2 my-1 mr-1"
                            onclick="return confirm('Вы действительно хотите отклонить приглашение?')"
                        >
                            <i class="la la-times"></i> Отказаться от участия
                        </button>
                    </form>
                    <x-inputs.button-link title="Вернуться назад" type="btn-outline-success" link="{{ route('events.invites.view') }}"></x-inputs.button-link>
                </div>
            @else
                <div class="button-group mt-4">
                    <x-inputs.button-link title="Вернуться назад" type="btn-outline-success" link="{{ route('events.invites.view') }}"></x-inputs.button-link>
                </div>
            @endif
        </x-card>
    </div>
@endsection
