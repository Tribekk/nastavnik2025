<label class="radio">
    <input type="radio" @if($value) value="{{ $value }}" @endif @if($checked) checked="checked" @endif name="{{ $name }}">
    <span></span>{{ $title }}</label>
