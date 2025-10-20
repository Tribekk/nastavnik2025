@if ($paginator->hasPages())
    <nav role="navigation" class="flex justify-between">
        @if($paginator->onFirstPage())
            <button rel="prev" disabled class="btn btn-info btn-lg m-2">
                Назад
            </button>
        @else
            <button wire:click="previousPage" rel="prev" class="btn btn-info btn-lg m-2">
                Назад
            </button>
        @endif


            @if($paginator->hasMorePages())
                <button wire:click="nextPage" rel="next" class="btn btn-info btn-lg m-2">
                    Далее
                </button>
            @else
                <button rel="next" disabled class="btn btn-info btn-lg m-2">
                    Далее
                </button>
            @endif
    </nav>
@endif
