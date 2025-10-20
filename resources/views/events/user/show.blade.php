@extends ('layout.page')

@section('subheader')
    <x-subheader title="Мои мероприятия"/>
@endsection

@section ('content')
    <div class="container">
        <x-card>
            <x-slot name="title">{{ $event->event->title }}</x-slot>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Организатор</div>
                            <div class="font-size-h6">{{ $event->event->orgunit->title }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Формат проведения</div>
                            <div class="font-size-h6">{{ $event->event->format->title }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Направление</div>
                            @foreach($event->event->directions as $direction)
                                <div class="font-size-h6">{{ $direction->direction->title }}</div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Статус мероприятия</div>
                            <div class="font-size-h6 mt-2 {{ $event->eventState->color() }}">{{ $event->eventState->title() }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Время начала</div>
                            <div class="font-size-h6 mt-2">{{ $event->event->start_at->format('d.m.Y H:i') }}</div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Время завершения</div>
                            <div class="font-size-h6 mt-2">{{ $event->event->finish_at->format('d.m.Y H:i') }}</div>
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="font-weight-bold font-size-h5">Аудитория</div>
                        <div class="button-group mt-2">
                            @foreach($event->event->audience as $item)
                                <div class="btn-secondary btn btn-sm" style="font-size: 14px;">{{ $item->audience->title }}</div>
                            @endforeach
                        </div>
                    </div>

                    @if($event->event->location)
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Место проведения</div>
                            <div class="font-size-h6">{{ $event->event->location }}</div>
                        </div>
                    @endif

                    @if($event->event->program)
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Программа мероприятия</div>
                            <div class="">{!! $event->event->program !!}</div>
                        </div>
                    @endif

                    @if($event->event->attachedFiles)
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Прикрепленные файлы</div>
                            <div class="mt-3">
                                @foreach($event->event->attachedFiles as $file)
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

            <div class="button-group mt-4">
                <x-inputs.button-link title="Вернуться назад" type="btn-outline-success" link="{{ route('events.view') }}"></x-inputs.button-link>
            </div>
        </x-card>
    </div>
@endsection
