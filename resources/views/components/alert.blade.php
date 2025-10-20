<div class="alert alert-custom alert-{{ $type }} d-inline-flex fade show mb-5" role="alert">
    @if($icon)
    <div class="alert-icon"><i class="{{ $icon }}"></i></div>
    @endif
    <div class="alert-text">{!! $text !!}</div>
    @if($close)
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
    @endif
</div>
