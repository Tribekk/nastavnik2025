<div>
    <?php if($user->hasAnyRole(['parent', 'teacher', 'curator'])): ?>
        <div class="form-group">
            <label for="school_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите компанию</label>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school_id','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchoolId','placeholder' => ''.e(__('Выберите компанию')).'','selected' => ''.e($school_id).'','selectedItemUrl' => '/school'])->html();
} elseif ($_instance->childHasBeenRendered('l1921812432-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1921812432-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1921812432-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1921812432-0');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school_id','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchoolId','placeholder' => ''.e(__('Выберите компанию')).'','selected' => ''.e($school_id).'','selectedItemUrl' => '/school']);
    $html = $response->html();
    $_instance->logRenderedChild('l1921812432-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    <?php elseif($user->hasRole('student')): ?>
        <?php if($errors->has('school_id')): ?>
             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e($errors->first('school_id')).'','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <?php elseif($errors->has('class_id')): ?>
             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e($errors->first('class_id')).'','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <?php endif; ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('school.select-school-class', ['schoolId' => ''.e($user->school_id).'','classId' => ''.e($user->class_id).''])->html();
} elseif ($_instance->childHasBeenRendered('l1921812432-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1921812432-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1921812432-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1921812432-1');
} else {
    $response = \Livewire\Livewire::mount('school.select-school-class', ['schoolId' => ''.e($user->school_id).'','classId' => ''.e($user->class_id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('l1921812432-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:school.select-school-class>
    <?php endif; ?>
<?php
//dd($user->Roles()->get());
?>
    <?php if($user->hasRole('employer') || $user->hasRole('teacher')): ?>
        <div class="form-group">
            <label for="orgunit_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите организацию</label>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'orgunit_id','id' => 'orgunit_id','url' => ''.e(route('admin.orgunits.view')).'','event' => 'setOrgunitId','placeholder' => ''.e(__('Выберите организацию')).'','selected' => ''.e($orgunit_id).'','selectedItemUrl' => '/admin/orgunits'])->html();
} elseif ($_instance->childHasBeenRendered('l1921812432-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l1921812432-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1921812432-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1921812432-2');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'orgunit_id','id' => 'orgunit_id','url' => ''.e(route('admin.orgunits.view')).'','event' => 'setOrgunitId','placeholder' => ''.e(__('Выберите организацию')).'','selected' => ''.e($orgunit_id).'','selectedItemUrl' => '/admin/orgunits']);
    $html = $response->html();
    $_instance->logRenderedChild('l1921812432-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <?php $__errorArgs = ['orgunit_id'];
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
    <?php endif; ?>


    <div class="form-group">
        <label for="phone-input" class="font-size-h6 font-weight-bolder text-dark required"><?php echo e(__('Телефон')); ?></label>
            <div class="input-group input-group-lg input-group-solid">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-phone"></i>
                    </span>
                </div>
                <input id="phone-input"
                       type="tel"
                       wire:ignore onchange="window.livewire.find('<?php echo e($_instance->id); ?>').set('phone', this.value);"
                       class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       name="phone"
                       value="<?php echo e(old('phone', $phone)); ?>"
                       placeholder="<?php echo e(__('+7 (___) ___ __ __')); ?>"
                >
            </div>

        <?php $__errorArgs = ['phone'];
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

    <div class="pb-lg-0 pb-5">
        <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" wire:click="submit">
            <?php echo e(__('Сохранить')); ?>

        </button>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#phone-input").inputmask("+7 (999) 999 99 99");

            window.livewire.on('setSchoolId', r => {
            window.livewire.find('<?php echo e($_instance->id); ?>').call("setUserSchool", r);
            });

            window.livewire.on('setClassId', r => {
            window.livewire.find('<?php echo e($_instance->id); ?>').call("setUserClass", r);
            });

            window.livewire.on('setOrgunitId', r => {
            window.livewire.find('<?php echo e($_instance->id); ?>').call("setOrgunit", r);
            });
        })
    </script>
<?php $__env->stopPush(); ?>



<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/users/account.blade.php ENDPATH**/ ?>