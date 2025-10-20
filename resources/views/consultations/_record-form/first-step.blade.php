<div class="pb-5" data-wizard-type="step-content" @if($step == "first") data-wizard-state="current" @endif>
    <h2 class="font-size-h2  font-alla font-pixel mb-5">
        Запланируйте время консультации
    </h2>

    <h3 class="font-size-h5 font-hero mb-2">
        Когда Вам и {{ Auth::user()->hasRole('parent') ? 'ребенку' : 'родителю' }} удобно подключиться к онлайн-встрече продолжительностью 1-1,5 часа?
    </h3>
    <p class="mt-2 font-size-h5 font-brown-light mb-8">
        {{-- * Можно выбирать любой день с 20 ноября до 30 декабря<br>
        ** --} Консультация доступна после прохождения глубинного тестирования {{-- Auth::user()->hasRole('parent') ? ' ребенком' : '' --}}
    </p>


    @if(Auth::user()->hasRole('parent'))
        @if(count($children) == 0)
            <div class="mb-8">
                <x-alert type="light-danger" text="Ребенок обязан пройти глубинное тестирование для получения консультации" :close="false"></x-alert>
                <a href="{{ route('observe.user') }}" class="btn btn-primary">Привязать аккаунт ребенка</a>
            </div>
        @endif

        <div class="@if(count($children) <= 1) d-none @endif">
            <x-inputs.select title="Выберите ребенка"
                             required
                             :values="$children"
                             model="child_id"
                             name="child_id" id="child_id"/>
        </div>
    @else
        @if(!Auth::user()->finishedDepthTests)
            <div class="mb-8">
                <x-alert type="light-danger" text="Необходимо пройти глубинные тесты перед тем как записываться на консультацию." :close="false"></x-alert>
            </div>
        @endif
    @endif

    <x-inputs.input-text-v title="Выберите день"
                           required
                           placeholder="Дата"
                           :date-picker="true"
                           model="date_at"
                           name="date_at" id="date_at"/>

    @if(count($timeIntervals))
        <x-inputs.select title="Выберите время (по уральскому времени)"
                         required
                         :values="$timeIntervals"
                         model="time_interval_id"
                         name="time_interval_id" id="time_interval_id"/>
    @elseif($date_at)
        <x-alert type="light-danger" text="На выбранный Вами день нет консультантов" :close="false"></x-alert>
    @endif
</div>

@push('scripts')
    <script>
        $('#date_at').on('change', function(e) {
            @this.call('setDate', e.target.value);
        });
    </script>
@endpush
