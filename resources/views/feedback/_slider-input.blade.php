<div class="row align-items-center my-2">
    <div class="col-lg-10 row">
        <div class="col-md-3 col-6 d-flex justify-content-md-end align-items-center order-0 mb-md-0 mb-4">
            <div class="font-size-h6 text-dark-75">{{ $leftLabel }}</div>
        </div>
        <div class="col-md-6 order-md-1 order-2">
            <div class="ion-range-slider {{ $sliderClass ?? "" }}">
                <input type="hidden" id="{{ $sliderId }}" name="{{ $sliderName }}"/>
            </div>
        </div>
        <div class="col-md-3 col-6 justify-content-md-start justify-content-end d-flex align-items-center order-md-2 order-1 mb-md-0 mb-4">
            <div class="font-size-h6 text-dark-75">{{ $rightLabel }}</div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#{{$sliderId}}').ionRangeSlider({
                min: 0,
                max: 10,
                from: {{ $value }},
                grid: true,
                grid_num: 10,
            });
        });
    </script>
@endpush
