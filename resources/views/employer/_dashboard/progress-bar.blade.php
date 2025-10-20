<div class="row align-items-center mb-4">
    <div class="col-md-7 order-1 order-md-0">
        <div class="progress">
            <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percentage }}%"></div>
        </div>
    </div>
    <div class="col-md-5">
        @isset($href)
            <a href="{{ $href }}" class="link">
        @endisset

            <span class="font-size-lg">{{ $title }}</span>
            <span class="font-weight-bold">({{ $value }} / {{ $percentage }}%)</span>

        @isset($href)
            </a>
        @endisset
    </div>
</div>
