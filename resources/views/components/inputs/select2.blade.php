<div class="form-group">
    @if($title)
    <label for="{{ $id }}" class="font-size-h6 font-weight-bolder text-dark @if($required) required @endif">{{ $title }}</label>
    @endif

    <livewire:components.select2
        name="{{$name}}" id="{{ $id }}"
        url="{{ $url }}"
        event="{{ $event }}"
        placeholder="{{ $placeholder }}"
        selected="{{ $value }}"
        multiple="{{ $multiple }}"
        selectedItemUrl="{{ $selectedUrl }}"

   />

    <div wire:ignore>
        @error(strArrToPath($name))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
