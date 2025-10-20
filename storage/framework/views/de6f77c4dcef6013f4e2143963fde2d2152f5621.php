<form class="form" method="POST" action="<?php echo e(route('attach.employer')); ?>">
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
        <label for="orgunit_id" class="text-dark font-size-h4 required">Выберите Вашу организацию:</label>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'orgunit_id','id' => 'orgunit_id','url' => ''.e(route('orgunits.view')).'','event' => 'setOrgunit','placeholder' => 'Организация','selected' => ''.e(old('orgunit_id') ?? '').'','selectedItemUrl' => '/orgunits'])->html();
} elseif ($_instance->childHasBeenRendered('gpyQUOm')) {
    $componentId = $_instance->getRenderedChildComponentId('gpyQUOm');
    $componentTag = $_instance->getRenderedChildComponentTagName('gpyQUOm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gpyQUOm');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'orgunit_id','id' => 'orgunit_id','url' => ''.e(route('orgunits.view')).'','event' => 'setOrgunit','placeholder' => 'Организация','selected' => ''.e(old('orgunit_id') ?? '').'','selectedItemUrl' => '/orgunits']);
    $html = $response->html();
    $_instance->logRenderedChild('gpyQUOm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:components.select2>
    </div>


    <div class="form-group">
        <label for="email" class="text-dark font-size-h4 required">Адрес электронной почты:</label>
         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['type' => 'email','name' => 'email','id' => 'email']); ?>
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
        <label for="position" class="text-dark font-size-h4 required">Ваша должность:</label>
         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'position','id' => 'position']); ?>
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
        <label for="token" class="text-dark font-size-h4 required">Введите код доступа:</label>
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

    <div class="pb-lg-0 pb-5">
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            <?php echo e(__('Назад')); ?>

        </a>

        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            <?php echo e(__('Продолжить')); ?>

        </button>
    </div>

</form>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/user/type/_employer-form.blade.php ENDPATH**/ ?>