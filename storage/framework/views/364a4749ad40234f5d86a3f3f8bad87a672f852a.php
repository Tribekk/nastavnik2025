<div>
    <select id="<?php echo e($select_id); ?>" name="<?php echo e($name); ?>" style="width: 100%;">

    </select>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('#<?php echo e($select_id); ?>').select2({
                placeholder: '<?php echo e($placeholder); ?>',
                allowClear: true,
                language: {
                    noResults: function(){
                        return "Нет результатов";
                    },
                    errorLoading: function(){
                        return "Не удалось загрузить";
                    },
                },
                ajax: {
                    url: '<?php echo e($url); ?>',
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    processResults: function (response) {
                        let items = response.data;

                        for(let i = 0; i < items.length; i++) {
                            items[i] = {
                                id: items[i].text,
                                text: items[i].text,
                            };
                        }

                        return {
                            results: items
                        };
                    }
                },
            });

            <?php if($selected): ?>
            $.ajax('<?php echo e($selectedItemUrl); ?>/<?php echo e($selected); ?>')
                .then(function (response) {
                    var newOption = new Option(response.title, response.title, true, true);
                    $('#<?php echo e($select_id); ?>').append(newOption).trigger('change');
                })
            <?php endif; ?>

            $('#<?php echo e($select_id); ?>').on('change', function (e) {
                window.livewire.emit('<?php echo e($event); ?>', e.target.value)
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/livewire/components/select-city.blade.php ENDPATH**/ ?>