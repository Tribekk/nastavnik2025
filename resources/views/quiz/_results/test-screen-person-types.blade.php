<div class="card-body" id="person-types">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-orange rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">&laquo;Образ Я&raquo;</h3>
            <div class="mx-5 mt-7">
                <h4 class="text-uppercase font-orange font-size-h5 font-hero font-weight-bold">Подходящие профессии</h4>
                <span class="text-dark-50 font-size-lg">Варианты выбора</span>
            </div>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            <div class="text-right font-size-h5 mb-18">
                Подходящий типаж выделен <span class="font-blue font-weight-bold">синим</span> цветом
            </div>

            <div class="row justify-content-center">
                @foreach($professionalTypeValues as $type)
                    <div class="col-md-4 col-6">
                        <a href="{{ route('quiz.person-type-detail', [$professionalTypesQuiz, $type->type_id, 'backTo' => backResultsUrl('person-types', $user->id)]) }}" class="d-flex flex-wrap flex-column align-items-center">
                            <img class="max-h-100px max-w-100px max-h-sm-125px max-w-sm-125px img-fluid" src="{{ asset("/img/professions/" . ($type->active ? $type->type->activeImage : $type->type->inActiveImage)) }}" alt="{{ $type->type->title }}">
                            <span class="font-size-md-h4 font-size-lg text-center font-blue font-weight-bold my-4">
                                {{ $type->type->title }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
