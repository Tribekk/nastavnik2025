<form class="form" method="POST" action="<?php echo e(route('attach.teacher')); ?>">
    <?php echo csrf_field(); ?>

    <?php if(session()->has('errors')): ?>
         <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e(session('errors')->first()).'']); ?>
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

    <div class="form-group">
        <label for="token" class="text-dark font-size-h4 required">Уважаемый куратор от компании,
            чтобы попасть в Ваш личный кабинет, просим ввести код доступа:</label>
         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'token','id' => 'token','placeholder' => 'xxxx-xxxx']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>

    <div class="form-group">
        <label for="token" class="text-dark font-size-h4 required">Выберете Вашу организацию:</label>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchool','placeholder' => ''.e(__('Укажите организацию')).'','selected' => ''.e(old('school_id')).'','selectedItemUrl' => '/admin/schools'])->html();
} elseif ($_instance->childHasBeenRendered('oKkXedK')) {
    $componentId = $_instance->getRenderedChildComponentId('oKkXedK');
    $componentTag = $_instance->getRenderedChildComponentTagName('oKkXedK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('oKkXedK');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'school_id','id' => 'school','url' => ''.e(route('admin.schools.view')).'','event' => 'setSchool','placeholder' => ''.e(__('Укажите организацию')).'','selected' => ''.e(old('school_id')).'','selectedItemUrl' => '/admin/schools']);
    $html = $response->html();
    $_instance->logRenderedChild('oKkXedK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        <label for="position" class="text-dark text-md-right font-size-h4 required">Ваша должность:</label>
         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'position','id' => 'position','placeholder' => 'Укажите вашу должность']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.attach.select-teacher-type', ['role' => ''.e(old('role', 'teacher')).''])->html();
} elseif ($_instance->childHasBeenRendered('6EMdLb3')) {
    $componentId = $_instance->getRenderedChildComponentId('6EMdLb3');
    $componentTag = $_instance->getRenderedChildComponentTagName('6EMdLb3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6EMdLb3');
} else {
    $response = \Livewire\Livewire::mount('user.attach.select-teacher-type', ['role' => ''.e(old('role', 'teacher')).'']);
    $html = $response->html();
    $_instance->logRenderedChild('6EMdLb3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:user.attach.select-teacher-type>


    <p class="pt-5 text-dark font-size-h4">Нажмите кнопку сохранить и Вы попадете в свой личный кабинет,
        где сможете видеть уже созданные структурные подразделения,
        либо добавлять  новые, назначать других кураторов,
        отслеживать процесс регистрации и анкетирования наставников.</p>

    <div class="pb-lg-0 pb-5">
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            <?php echo e(__('Назад')); ?>

        </a>

        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            <?php echo e(__('Сохранить')); ?>


        </button>
    </div>

</form>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/type/_teacher-form.blade.php ENDPATH**/ ?>