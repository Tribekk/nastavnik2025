<div class="form-group">
    <?php if($title): ?>
        <label for="<?php echo e($id); ?>" class="font-size-h6 font-weight-bolder text-dark <?php if($required): ?> required <?php endif; ?>  <?php $__errorArgs = [strArrToPath($name)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($title); ?></label>
    <?php endif; ?>

        <textarea id="<?php echo e($id); ?>" name="<?php echo e($name); ?>"><?php echo $value ?? null; ?></textarea>

    <?php $__errorArgs = [strArrToPath($name)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback font-size-sm">
            <strong><?php echo e($message); ?></strong>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#<?php echo e($id); ?>').summernote({
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
                    url: "<?php echo e(route('summernote.upload')); ?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function(data) {
                        const image = $('<img>').attr({src: data.url, width: "100%"});
                        $('#<?php echo e($id); ?>').summernote("insertNode", image[0]);
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
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/components/inputs/summernote-editor.blade.php ENDPATH**/ ?>