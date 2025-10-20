<div class="my-3 {{ $classes }} @if($value && $value != 'all') text-success @endif">
    <label for="{{ $id }}" class="mb-3">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}" class="form-control form-control-solid">
        @foreach($items as $item)
            <option value="{{ $item['value'] }}"
                    @if($value == $item['value']) selected @endif>{{ $item['title'] }}</option>
        @endforeach
    </select>
</div>
