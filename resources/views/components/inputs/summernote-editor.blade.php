<div class="form-group">
    @if($title)
        <label for="{{ $id }}" class="font-size-h6 font-weight-bolder text-dark @if($required) required @endif  @error(strArrToPath($name)) is-invalid @enderror">{{ $title }}</label>
    @endif

        <textarea id="{{ $id }}" name="{{ $name }}">{!! $value ?? null !!}</textarea>

    @error(strArrToPath($name))
        <span class="invalid-feedback font-size-sm">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#{{$id}}').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr']],
                    ['view', ['codeview']]
                ],
                maxWidth:1600,
                fontsize: '16',
                height: 250,
                lang: "ru-RU",
                codeviewFilter: true,
                codeviewIframeFilter: true,
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                },
                colorsName:[
                    ["Черный", "Тундора", "Голубино-серый", "Звездная пыль", "Бледный сланец", "Галерея", "Алебастр", "Белый"],
                    ["Красный", "Апельсиновая корка", "Желтый", "Зеленый", "Голубой", "Синий", "Электро-фиолетовый", "Пурпурный"],
                    ["Азалия", "Карри", "Яичный белок", "Занах", "Боттичелли", "Тропический синий", "Мишка", "Сумерки"],
                    ["Тонис Пинк", "Персиковый апельсин", "Крем-брюле", "Росток", "Каспер", "Перано", "Холодный фиолетовый", "Кэрис Пинк"],
                    ["Мэнди", "Раджа", "Одуванчик", "Оливин", "Гольфстрим", "Викинг", "Голубая Маргарита", "Пус"],
                    ["Гвардеец Красный", "Огненный куст", "Золотая мечта", "Челси-огурец", "Смальтово-синий", "Бостонский синий", "Бабочка куст", "Кадиллак"],
                    ["Сангрия", "Май Тай", "Золото Будды", "Лесной зеленый", "Эдем", "Голубая Венеция", "Метеорит", "Бордовый"],
                    ["Палисандр", "Корица", "Олив", "Петрушка", "Тибр", "Полночный синий", "Валентино", "Лулу"],
                ],
            });

            function uploadImage(file) {
                var data = new FormData();
                data.append("file", file);
                $.post({
                    url: "{{ route('summernote.upload') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function(data) {
                        const image = $('<img>').attr({src: data.url, width: "100%"});
                        $('#{{$id}}').summernote("insertNode", image[0]);
                    },
                    error: function(error) {
                        let message = '';
                        if(error.responseJSON.errors) {
                            const firstKey = Object.keys(error.responseJSON.errors)[0];
                            message = error.responseJSON.errors[firstKey][0];
                        } else if (error.responseJSON.message) {
                            message = error.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Не удалось загрузить',
                            confirmButtonColor: 'var(--success)',
                            text: message,
                        });
                    }
                });
            }
        });
    </script>
@endpush
