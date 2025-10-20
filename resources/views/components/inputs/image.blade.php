<div class="form-group">
    @if($title)
        <label for="{{ $id }}" class="font-size-h6 font-weight-bolder d-block text-dark @if($required) required @endif">{{ $title }}</label>
    @endif

    <div class="image-input image-input-outline @error($name) is-invalid @enderror" id="image-input-{{$name}}">
        <div class="image-input-wrapper" id="image-input-{{$name}}-wrapper"></div>

        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
               data-action="change" data-toggle="tooltip" title=""
               data-original-title="{{ __('Изменить') }}">
            <i class="fa fa-pen icon-sm text-muted"></i>
            <input type="file" @if($model) wire:model.defer="{{ $model }}" @endif id="{{ $id }}" name="{{ $name }}" value="{{ old('avatar') }}">
        </label>

        @if($destroyAction)
            <label id="{{$name}}-destroy" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                    data-action="remove"
                    data-toggle="tooltip"
                    data-original-title="{{ __('Удалить') }}">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </label>
        @endif

    </div>

    @error($name)
        <span class="invalid-feedback font-size-sm">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


@push('scripts')
    <script>
        $(document).ready(function () {
            let placeholder = '{{ $placeholder }}';

            previewUploadFile(null, 'image-input-{{$name}}', 'image-input-{{$name}}-wrapper');

            function previewUploadFile(input, inputId, wrapperId) {

                if (input && input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById(inputId).style.backgroundImage = `url(${e.target.result})`;
                        document.getElementById(wrapperId).style.backgroundImage = `url(${e.target.result})`;
                    };

                    reader.readAsDataURL(input.files[0]);
                    $("#{{$name}}-destroy").hide();
                } else {
                    document.getElementById(inputId).style.backgroundImage = `url(${placeholder})`;
                    document.getElementById(wrapperId).style.backgroundImage = `url(${placeholder})`;
                    $("#{{$name}}-destroy").show();
                }
            }

            $('#{{$id}}').change(function() {
                previewUploadFile(this, 'image-input-{{$name}}', 'image-input-{{$name}}-wrapper')
            });

            @if($destroyAction)
                $('#{{$name}}-destroy').click(function () {
                    $.post('{{ $destroyAction }}', {_method: "delete", _token: "{{ csrf_token() }}"})
                        .then(function (response) {
                            toastr['success'](response);
                            placeholder = '{{ $destroyPlaceholder }}';
                            previewUploadFile(null, 'image-input-{{$name}}', 'image-input-{{$name}}-wrapper');
                            $('#{{$name}}-destroy').remove();
                        });
                });
            @endif
        });
    </script>
@endpush
