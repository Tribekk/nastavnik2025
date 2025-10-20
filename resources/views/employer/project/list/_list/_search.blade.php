<div class="my-3 col-md-4">
    <div class="form-group">
        <label class="mb-3">Вероятность остаться в родном городе</label>
        <div class="ion-range-slider progress-success">
            <input type="hidden" id="chances_of_staying" name="chances_of_staying"/>
        </div>
    </div>
</div>

<x-tables.filter-inputs.select2 classes="col-md-4"
                                name="activity_kind"
                                id="activity_kind"
                                label="{{ __('Выбор по матрице профессий') }}"
                                placeholder="{{ __('Выбор по матрице профессий') }}"
                                event="filterActivityKind"
                                indexUrl="{{ route('profession.activity_kinds.list') }}"
                                showUrl="/profession/activity_kinds"
                                value="{{ request()->activity_kind }}"></x-tables.filter-inputs.select2>

{{--<x-tables.filter-inputs.select2 classes="col-md-4"--}}
{{--                                name="activity_object"--}}
{{--                                id="activity_object"--}}
{{--                                label="{{ __('Выбор по матрице профессий') }}"--}}
{{--                                placeholder="{{ __('Выбор по матрице профессий') }}"--}}
{{--                                event="filterActivityObject"--}}
{{--                                indexUrl="{{ route('profession.activity_objects.list') }}"--}}
{{--                                showUrl="/profession/activity_objects"--}}
{{--                                value="{{ request()->activity_object }}"></x-tables.filter-inputs.select2>--}}

<livewire:filters.school-and-class classes="row no-gutters col-md-8 my-3"
                                   schoolClasses="col-md-6 mt-md-0 pr-md-4 pr-0"
                                   classClasses="col-md-6 mt-6 mt-md-0 pl-md-4 pl-0"/>

@push('scripts')
    <script>
        $(document).ready(_ => {
            let search = new URLSearchParams(window.location.search);

            let chances = search.has('chances_of_staying') ? (search.get('chances_of_staying')).split(';') : [0,10];
            try {
                chances[0] = +chances[0] < 0 ? 0 : +chances[0];
                chances[1] = +chances[1] > 10 ? 10 : +chances[1];
            } catch (e) {
                chances = [0,10];
            }

            $('#chances_of_staying').ionRangeSlider({
                type: "double",
                min: 0,
                max: 10,
                from: chances[0],
                to: chances[1],
            });
        })
    </script>
@endpush

@push('css')
    <style>
        /* alla progress */
        .progress-success .irs--flat .irs-bar,
        .progress-success .irs--flat .irs-from,
        .progress-success .irs--flat .irs-to,
        .progress-success .irs--flat .irs-single,
        .progress-success .irs--flat .irs-handle > i:first-child {
            background-color: #1BC5BD;
        }

        .progress-success .irs--flat .irs-from:before,
        .progress-success .irs--flat .irs-to:before,
        .progress-success .irs--flat .irs-single:before {
            border-top-color: #1BC5BD;
        }
    </style>
@endpush
