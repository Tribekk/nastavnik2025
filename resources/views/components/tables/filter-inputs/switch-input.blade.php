<div class="my-3 {{ $classes }}">
    <div class="row no-gutters align-items-center">
        <label class="col-9 col-form-label cursor-pointer @if($value) text-success @endif" for="{{ $id }}">{{ $label }}</label>
        <div class="col-3 d-flex justify-content-end">
            <span class="switch switch-sm switch-success">
                <label>
                    <input type="checkbox" @if($value == 'on') checked @endif id="{{ $id }}" name="{{ $name }}">
                    <span></span>
                </label>
            </span>
        </div>
    </div>
</div>
