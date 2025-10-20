<div class="my-3 {{ $classes }}">
    <label for="{{ $id }}" class="mb-3 @if($value) text-success @endif">{{ $label }}</label>

    @if($icon)
        <div class="input-icon">
    @endif
        <input type="{{ $type }}"
               id="{{ $id }}"
               name="{{ $name }}"
               class="form-control form-control-solid"
               @if($placeholder) placeholder="{{ $placeholder }}" @endif
               @if($model) wire:model="{{ $name }}" @endif
               value="{{ $value }}">
    @if($icon)
            <span>
                <i class="{{ $icon }} text-muted"></i>
            </span>
        </div>
    @endif
</div>

@push('scripts')
    @if($type == "date")
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

                $('#{{ $id }}').datepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: 'yyyy-mm-dd',
                }).on('changeDate', function(e) {
                    $('#{{ $id }}').datepicker('hide');
                });
            });
        </script>
    @endif

    @if($type == "datetime-local")
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

                $('#{{ $id }}').datetimepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: "yyyy-mm-ddThh:ii",
                }).on('changeDate', function(e) {
                    $('#{{ $id }}').datetimepicker('hide');
                });
            });
        </script>
    @endif

    @if($type == "date" || $type == "datetime-local")
        <script>
            $(document).ready(function () {
                $('#{{$id}}').keydown(e => {
                    if (e.keyCode === 10 || e.keyCode === 13 || e.keyCode === 32) {
                        e.stopPropagation();
                        e.preventDefault();
                        return false;
                    }
                });
            })
        </script>
    @endif
@endpush
