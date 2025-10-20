<div class="form-group">
    @if($title)
        <label for="{{ $id }}" class="font-size-h6 font-weight-bolder text-dark @if($required) required @endif">{{ $title }}</label>
    @endif
    <textarea
        name="{{ $name }}"
        @if($model) wire:model.defer="{{ $model }}" @endif
        @if($readOnly) readonly @endif
        class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg  @error(strArrToPath($name)) is-invalid @enderror"
        id="{{ $id }}"
        rows="{{ $rows }}">@if(old($name)) {{ old($name) }} @else {!! $value !!} @endif</textarea>

    @error(strArrToPath($name))
        <span class="invalid-feedback font-size-sm">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
