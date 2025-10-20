@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
        <button class="btn btn-info font-size-h5 mr-3" disabled aria-disabled="true">Назад</button>
    @else
        <a role="button" class="btn btn-info font-size-h5 mr-3" href="{{ $paginator->previousPageUrl() }}">Назад</a>
    @endif

    @if ($paginator->hasMorePages())
        <a role="button" class="btn btn-info font-size-h5" href="{{ $paginator->nextPageUrl() }}">Далее</a>
    @else
        <button class="btn btn-info font-size-h5" disabled aria-disabled="true">Далее</button>
    @endif
@endif
