<div class="<?php echo e($classes); ?>">
    <div class="<?php echo e($schoolClasses); ?>">
        <label for="school" class="mb-3">Компания</label>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school','url' => ''.e(route('admin.schools.view')).'','event' => 'filterBySchool','placeholder' => ''.e(__('Компания')).'','selected' => ''.e($schoolId).'','selectedItemUrl' => '/school'])->html();
} elseif ($_instance->childHasBeenRendered('l542427056-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l542427056-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l542427056-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l542427056-0');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school','url' => ''.e(route('admin.schools.view')).'','event' => 'filterBySchool','placeholder' => ''.e(__('Компания')).'','selected' => ''.e($schoolId).'','selectedItemUrl' => '/school']);
    $html = $response->html();
    $_instance->logRenderedChild('l542427056-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="<?php echo e($classClasses); ?>">
        <label for="class" class="mb-3">Структурное подразделение</label>
        <div class="<?php echo e($schoolId ? '' : 'select2-disabled'); ?>">
            <div wire:ignore>
                <select type="text" id="class" style="width: 100%" name="class_id"></select>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('css'); ?>
    <style>
        .select2-disabled {
            pointer-events: none;
            opacity: .5;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            const initClassSelect2 = (schoolId, classId = null) => {
                initSelect2(
                    'class',
                    'Структурное подразделение',
                    'filterByClass',
                    `/school/${schoolId}/classes`,
                    `/school/${schoolId}/classes`,
                    `${classId ? classId : ''}`,
                    (response) => {
                        let data = response.data;
                        data.forEach(row =>
                            row.text = `${row.number}${row.letter} (${row.year ? row.year : 'не указан'})`
                        );

                        return {
                            results: response.data,
                        }
                    },
                    (response) => new Option(`${response.number}${response.letter} (год: ${response.year ? response.year : 'не указан'})`, response.id, true, true),
                );
            };

            /**
             * Ивенты на обновление полей
             */
            window.livewire.on('filterBySchool', val => window.livewire.find('<?php echo e($_instance->id); ?>').call('setSchool', val));
            window.livewire.on('filterByClass', val => window.livewire.find('<?php echo e($_instance->id); ?>').call('setClass', val));

            /**
             * Ивены реинизиализации select2
             */
            window.livewire.find('<?php echo e($_instance->id); ?>').on('reInitClass', schoolId => initClassSelect2(schoolId));

            initClassSelect2('<?php echo e($schoolId ?? ''); ?>', '<?php echo e($classId ?? ''); ?>');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/filters/school-and-class.blade.php ENDPATH**/ ?>