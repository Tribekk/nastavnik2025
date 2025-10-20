<div class="card card-custom {{ $classes }}">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        @if(!isset($cardTitle))
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ $title }}</span>
            </h3>
        @else
            {{ $cardTitle }}
        @endif

        @isset($toolbar)
            <div class="card-toolbar">
                {{ $toolbar }}
            </div>
        @endisset
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
