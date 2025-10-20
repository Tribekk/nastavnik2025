<div class="card-body" id="traits">
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
            <h4 class="mb-15 font-pixel text-dark-50">Результаты: уточнение выбора профессии</h4>
            <h4 class="font-size-h3 font-blue font-hero mt-10 mb-5">
                Профессии "{{ $suitableProfessionMatrix->activityObject->title }}" + "{{ $suitableProfessionMatrix->activityKind->title }}"
            </h4>

            <p class="font-size-h4">
                {{ $suitableProfessionMatrix->description }}
            </p>


            <h4 class="font-size-h3 font-blue font-hero mt-10 mb-5">
                Примеры профессий:
            </h4>

            <p class="font-size-h4">
                {!! $suitableProfessionMatrix->professions !!}
            </p>
        </div>
    </div>
</div>
