<label class="checkbox font-size-sm-h4 font-size-lg d-flex my-2 align-items-center {{ $type }}" for="{{ $id }}">
    <input type="checkbox" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" @if($model) wire:model.live="{{$model}}" @endif />
    <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
    {{ $label }}
</label>
