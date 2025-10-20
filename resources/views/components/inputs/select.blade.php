<div class="form-group">
    <label for="{{ $id }}" class="font-size-h6 font-weight-bolder text-dark @if($required) required @endif">{{ $title }}</label>
    <select class="form-control form-control-solid h-auto py-4 px-6 rounded-lg" @if($model) wire:model="{{$model}}" @endif name="{{ $name }}" id="{{ $id }}">
        @foreach($values as $item)
            <option value="{{ $item['value'] }}" @if($item['value'] == $currentValue) selected @endif>{{ $item['title']  }}</option>
        @endforeach
    </select>

    @error($name)
    <span class="text-danger font-size-sm">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
