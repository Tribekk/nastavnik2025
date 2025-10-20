<button type="submit" class="btn {{ $type }} {{ $size }} px-4 py-2 my-1 mr-1" {{ $disabled }}>
    @if ($icon) <i class="la {{ $icon }}"></i> @endif
    {{ $title }}
</button>
