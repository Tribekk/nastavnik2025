<div class="form-group">
    @if($title)
        <label for="{{ $id }}" class="font-size-h6 font-weight-bolder text-dark @if($required) required @endif">{{ $title }}</label>
    @endif

    @if($prependIcon)
        <div class="input-group input-group-lg input-group-solid">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="{{ $prependIcon }}"></i>
                </span>
            </div>
    @endif
        <input id="{{ $id }}"
               type="{{ $type }}"
               class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error(strArrToPath($name)) is-invalid @enderror @error(strArrToPath($name)."*") is-invalid @enderror"
               @if($model && !($datePicker || $dateTimePicker)) wire:model.defer="{{ $model }}" @endif
               name="{{ $name }}"
               @if($multiple) multiple @endif
               @if($readonly) readonly @endif

               @if($placeholder) placeholder="{{ $placeholder }}" @endif
               @if($min) min="{{ $min }}" @endif
               @if($step) step="{{ $step }}" @endif
               @if(old($name))
                   value="{{ old($name) }}"
               @else
                   value="{!! $value !!}"
               @endif
               @if($accept) accept="{{ $accept }}" @endif
        >

    @if($prependIcon)
        </div>
    @endif

    @if(!$errors->has(strArrToPath($name)) && $multiple)
        @error(strArrToPath($name).'.*')
            <span class="invalid-feedback" role="alert" style="display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    @endif

    @error(strArrToPath($name))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            @if($datePicker || $dateTimePicker)
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
            @endif

            @if($datePicker)
                // minimum setup
                $('#{{$id}}').datepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: "dd.mm.yyyy",
                }).on('changeDate', function (e) {
                    $('#{{$id}}').datepicker('hide');
                });
            @endif

            @if($dateTimePicker)
                // minimum setup
                $('#{{$id}}').datetimepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: "yyyy-mm-ddThh:ii",
                }).on('changeDate', function (e) {
                    $('#{{$id}}').datetimepicker('hide');
                });
            @endif

            @if($datePicker || $dateTimePicker)
                @if($model)
                    $('#{{$id}}').change(e => @this.set('{{ $model }}', e.target.value));
                @endif

                $('#{{$id}}').keydown(e => {
                    //if (e.keyCode === 10 || e.keyCode === 13 || e.keyCode === 32) {
                    //    e.stopPropagation();
                    //    e.preventDefault();
                    //    return false;
                    //}
                });
            @endif
        });
    </script>
@endpush
