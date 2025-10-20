<div class="form-group my-2">
    <div class="row no-gutters align-items-center">
        <label class="col-9 col-form-label cursor-pointer font-size-h6 text-dark @if($required) required @endif" for="{{ $id }}">{{ $title }}</label>
        <div class="col-3 d-flex justify-content-end">
            <span class="switch switch-sm switch-success">
                <label>
                    <input type="checkbox" @if($value) checked @endif id="{{ $id }}" name="{{ $name }}">
                    <span></span>
                </label>
            </span>
        </div>
    </div>

    @error(strArrToPath($name))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
