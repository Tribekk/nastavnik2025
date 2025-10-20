<div class="row align-items-center mb-4">
    <div class="col-md-7 order-1 order-md-0">
        <div class="progress">
            <div class="progress-bar progress-green" role="progressbar" style="width: {{ $percentageParent }}%"></div>
            <div class="progress-bar progress-light-green" role="progressbar" style="width: {{ $percentageChild }}%"></div>
        </div>
    </div>
    <div class="col-md-5">
        @isset($href)
            <a href="{{ $href }}" class="link">
        @endisset

            <span class="font-size-lg">{{ $title }}</span>
            <span class="font-weight-bold">(наставники: {{ $valueChild }} / {{ $percentageChild }}%)</span>

        @isset($href)
            </a>
        @endisset
    </div>
</div>
