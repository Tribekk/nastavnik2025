<form>
    <div class="mb-10">
        <div class="row align-items-center">
            <div class="col-12 ">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="mt-5">{{ __('Фильтры') }}</h3>
                    </div>
                    <div class="col-12 my-3">
                        <input type="text" name="q" class="form-control form-control-solid" placeholder="{{ __('Поиск по дате, временному интервалу') }}" value="{{ request()->q }}">
                    </div>
                    <div class="col-12 my-3">
                        <div class="form-group">
                            <label class="mb-3">{{ __('Дата:') }}</label>
                            <input type="date" id="date_at" name="date_at" class="form-control form-control-solid" placeholder="{{ __('Дата') }}" value="{{ request()->date_at }}">
                        </div>
                    </div>

                    <div class="col-auto">
                        <x-inputs.submit title="{{ __('Искать') }}"/>
                        <x-inputs.button-link link="{{ route('consultant.meeting_schedule') }}" title="{{ __('Сбросить фильтры') }}" type="btn-outline-success"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            var arrows;
            if (KTUtil.isRTL()) {
                arrows = {
                    leftArrow: '<i class="la la-angle-right"></i>',
                    rightArrow: '<i class="la la-angle-left"></i>'
                }
            } else {
                arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }

            // minimum setup
            $('#date_at').datepicker({
                language: 'ru',
                rtl: false,
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows,
                clearBtn: true,
                format: 'yyyy-mm-dd',
            }).on('changeDate', function(e) {
                $('#date_at').datepicker('hide');
            });
        });
    </script>
@endpush
