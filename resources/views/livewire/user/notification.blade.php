<div class="d-flex align-items-center bg-light-{{ $type }} rounded p-5 gutter-b" wire:self.ignore>
    <span class="svg-icon svg-icon-warning mr-5">
        <span class="svg-icon svg-icon-lg">
            <i class="{{ $icon }} icon-2x text-{{ $type }}"></i>
        </span>
    </span>
    <div class="d-flex flex-column flex-grow-1 mr-2">
        <a href="{{ $link }}" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">
            {{ $title }}
        </a>
        <span class="text-muted font-size-sm">
            {{ $created }}
        </span>
    </div>
    <div class="d-flex">
        @if($unread)
            <button wire:click.prevent="markAsRead" title="{{ __('Пометить прочитанным') }}" class="btn btn-sm btn-icon btn-light-{{ $type }}">
                <i class="la la-check"></i>
            </button>
        @endif
    </div>
</div>
