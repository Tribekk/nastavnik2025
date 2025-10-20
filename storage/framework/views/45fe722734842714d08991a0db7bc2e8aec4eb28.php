<div>
    <form wire:submit.prevent="updateUser">
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg"><?php echo e(__('Мои данные1')); ?></h3>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-auto">
                    <div class="image-input image-input-outline" style="background-image: url(<?php echo e(Auth::user()->avatarUrl); ?>)">
                        <div class="image-input-wrapper" style="background-image: url(<?php echo e(Auth::user()->avatarUrl); ?>)"></div>

                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                               data-action="change" data-toggle="tooltip" title=""
                               data-original-title="<?php echo e(__('Изменить')); ?>">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                            <input type="file" wire:model="new_avatar" name="new_avatar">
                            <input type="hidden" name="profile_avatar_remove">
                        </label>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                              wire:click="removeAvatar"
                              data-action="remove"
                              data-toggle="tooltip"
                              data-original-title="<?php echo e(__('Удалить')); ?>">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                    </div>
                </div>
                <div class="col-6 ml-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="font-weight-bold mr-2">Email:</span>
                        <?php if($email): ?>
                            <a href="mailto:<?php echo e($email); ?>" class="text-muted text-hover-primary"><?php echo e($email); ?></a>
                        <?php else: ?>
                           <span class="text-muted">Не указан</span>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="font-weight-bold mr-2">Телефон:</span>
                        <a href="tel:<?php echo e(unFormatPhone($phone)); ?>" class="text-muted text-hover-primary" id="phone"><?php echo e($phone); ?></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2"><?php echo e(__('Роль')); ?>:</span>
                        <span class="text-muted"><?php echo e(Auth::user()->rolesAsString); ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php $__errorArgs = ['new_avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="last_name" class="font-size-h6 font-weight-bolder text-dark required"><?php echo e(__('Фамилия')); ?></label>
            <input wire:model="last_name" type="text" id="last_name" name="last_name" class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="first_name" class="font-size-h6 font-weight-bolder text-dark required"><?php echo e(__('Имя')); ?></label>
            <input wire:model="first_name" id="first_name" name="first_name" class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="middle_name" class="font-size-h6 font-weight-bolder text-dark"><?php echo e(__('Отчество')); ?></label>
            <input wire:model="middle_name" id="middle_name" name="middle_name" class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <?php if(Auth::user()->hasRole('parent')): ?>
            <div class="form-group">
                <label for="school_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите компанию</label>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school_id','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchoolId','placeholder' => ''.e(__('Выберите компанию')).'','selected' => ''.e($school_id).'','selectedItemUrl' => '/school'])->html();
} elseif ($_instance->childHasBeenRendered('l1118942298-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1118942298-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1118942298-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1118942298-0');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school_id','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchoolId','placeholder' => ''.e(__('Выберите компанию')).'','selected' => ''.e($school_id).'','selectedItemUrl' => '/school']);
    $html = $response->html();
    $_instance->logRenderedChild('l1118942298-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        <?php elseif(Auth::user()->hasRole('student')): ?>
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
    $html = \Livewire\Livewire::mount('school.select-school-class', ['schoolId' => ''.e(Auth::user()->school_id).'','classId' => ''.e(Auth::user()->class_id).''])->html();
} elseif ($_instance->childHasBeenRendered('l1118942298-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1118942298-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1118942298-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1118942298-1');
} else {
    $response = \Livewire\Livewire::mount('school.select-school-class', ['schoolId' => ''.e(Auth::user()->school_id).'','classId' => ''.e(Auth::user()->class_id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('l1118942298-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:school.select-school-class>
        <?php endif; ?>

        <div class="pb-lg-0 pb-5">
            <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                <?php echo e(__('Сохранить')); ?>

            </button>
        </div>

    </form>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })

        document.addEventListener('DOMContentLoaded', function () {
            window.livewire.on('setSchoolId', r => {
                window.livewire.find('<?php echo e($_instance->id); ?>').call("setUserSchool", r);
            });

            window.livewire.on('setClassId', r => {
                window.livewire.find('<?php echo e($_instance->id); ?>').call("setUserClass", r);
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/livewire/user/profile/account.blade.php ENDPATH**/ ?>