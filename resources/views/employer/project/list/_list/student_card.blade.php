<div class="card gutter-b">
    <div class="card-header">
        <span class="font-size-h3 mb-0 mr-1 font-weight-bold">{{  $students->firstItem() + $index }}.</span>
        <span class="font-size-h3 mb-0 font-weight-bold">{{ $student->fullName }}</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 my-2">
                <div class="font-weight-bold font-size-h4">
                    Возраст / структурное подразделение
                    <div class="font-size-h5 font-weight-normal text-dark">{{ $student->fullYears }} / {{ $student->class->number }}</div>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="font-weight-bold font-size-h4">
                    Компания
                    <div class="font-size-h5 font-weight-normal text-dark">{{ $student->school->number }}</div>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="font-weight-bold font-size-h4">
                    % Тип мышления
                    <div>
                        @forelse($wrapper->typeThinking($student) as $item)
                            <span class="font-size-h5 font-weight-normal text-dark">
                                {{ $item->percentage }}%:
                                <span class="{{ $item->is_higher ? 'font-weight-bold' : '' }}">
                                    {{ $item->type->short_title }};
                                </span>
                            </span>
                        @empty
                            -
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="font-weight-bold font-size-h4">
                    % соответствия типажу
                    <div class="font-size-h5 text-dark {{ $wrapper->percentConformityPersonType($student) > 50 ? 'font-weight-bold' : '' }}">
                         {{ $wrapper->percentConformityPersonType($student) ?? '0' }}%
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-8 my-2">
                <div class="font-weight-bold font-size-h4">
                    Образ будущего в ожиданиях родителей
                    <div class="font-weight-normal text-dark font-size-h6 mb-2">
                        @forelse($wrapper->parentsImagineFeature($student) as $item)
                            <div class="font-weight-bold my-3">{{ $item['parent']->fullName }}</div>
                            @forelse($item['imagine'] as $imagine)
                                <div class="my-2">{{ $imagine }}</div>
                            @empty
                                -
                            @endforelse
                        @empty
                            -
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="font-weight-bold font-size-h4">
                    Родители:
                    @forelse($student->observers as $parent)
                        <div class="text-dark font-size-h5 font-weight-normal">
                            {{ $parent->user->fullName }}
                        </div>
                    @empty
                        <div class="font-weight-normal">-</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="">
            <div class="font-size-lg mx-1">
                Пригласить на:
            </div>
            <div class="button-group">
                <button class="btn btn-outline-success my-1 mx-1">
                    <i class="la la-sign-in-alt mb-1 mr-2"></i>
                    Мероприятие
                </button>
                <button class="btn btn-outline-success my-1 mx-1">
                    <i class="la la-sign-in-alt mb-1 mr-2"></i>
                    Стажировка
                </button>
            </div>
        </div>
    </div>
</div>
