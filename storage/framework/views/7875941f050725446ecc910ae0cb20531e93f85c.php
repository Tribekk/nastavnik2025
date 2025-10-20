<div>
    <div class="form-group">
        <label for="school_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите компанию</label>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school_id','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchoolId','placeholder' => ''.e(__('Выберите компанию')).'','selected' => ''.e($schoolId).'','selectedItemUrl' => '/school'])->html();
} elseif ($_instance->childHasBeenRendered('l595706212-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l595706212-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l595706212-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l595706212-0');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school_id','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchoolId','placeholder' => ''.e(__('Выберите компанию')).'','selected' => ''.e($schoolId).'','selectedItemUrl' => '/school']);
    $html = $response->html();
    $_instance->logRenderedChild('l595706212-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <?php $__errorArgs = ['school_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert" style="display: block;">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="class_id" class="font-size-h6 font-weight-bolder text-dark <?php echo e($nullableClassId ? "" : "required"); ?>">Выберите структурное подразделение</label>
        <select name="class_id" id="class_id" style="width: 100%;"></select>

        <?php $__errorArgs = ['class_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span wire:ignore class="invalid-feedback" role="alert" style="display: block;">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function initClass(schoolId) {
                $('#class_id').select2({
                    placeholder: '<?php echo e(__('Выберите структурное подразделение')); ?>',
                    language: {
                        noResults: function(){
                            return "Нет результатов";
                        },
                        errorLoading: function(){
                            return "Не удалось загрузить";
                        },
                    },
                    ajax: {
                        url: `/school/${schoolId}/classes`,
                        dataType: 'json',
                        data: function (params) {
                            var query = {
                                q: params.term,
                            }
                            return query;
                        },
                        processResults: function (response) {
                            let data = response.data;
                            data.forEach(row => row.text =
                                `${row.number}${row.letter} (${row.year ? row.year : 'не указан'})`
                            );

                            return {
                                results: response.data
                            };
                        }
                    }
                });

                $('#class_id').off('change');
                $('#class_id').on('change', function (e) {
                    window.livewire.emit('setClassId', e.target.value)
                });
            }

            initClass();

            window.livewire.on('setSchoolId', r => {
                window.livewire.find('<?php echo e($_instance->id); ?>').call("setSchool", r);
            });

            window.livewire.on('initSelectClass', r => {
                setTimeout(() => initClass(+r), 250);
            });

            <?php if($classId): ?>
                window.livewire.on('initSelectedClass', r => {
                    $.ajax(`/school/class/${+r}/json`)
                        .then(function (response) {
                            const title = `${response.number}${response.letter} (год: ${response.year ? response.year : 'не указан'})`;
                            var newOption = new Option(title, response.id, true, true);
                            $('#class_id').append(newOption);
                        })
                });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/school/select-school-class.blade.php ENDPATH**/ ?>