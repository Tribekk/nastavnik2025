<form class="form" method="POST" action="<?php echo e(route('attach.student')); ?>">
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

     <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Дата рождения','readonly' => true,'name' => 'birth_date','id' => 'birth_date','datePicker' => true,'required' => true,'placeholder' => 'дд.мм.гггг']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('school.select-school-class', [])->html();
} elseif ($_instance->childHasBeenRendered('3No0WI6')) {
    $componentId = $_instance->getRenderedChildComponentId('3No0WI6');
    $componentTag = $_instance->getRenderedChildComponentTagName('3No0WI6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3No0WI6');
} else {
    $response = \Livewire\Livewire::mount('school.select-school-class', []);
    $html = $response->html();
    $_instance->logRenderedChild('3No0WI6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:school.select-school-class>


    <input type="text" name="sex" value="<?php echo e(request('sex' , 1)); ?>" hidden>

    <div class="pb-lg-0 pb-5">
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            <?php echo e(__('Назад')); ?>

        </a>

        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            <?php echo e(__('Продолжить')); ?>

        </button>
    </div>

</form>

<?php $__env->startPush('js'); ?>
    <script>

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/user/type/_student-form.blade.php ENDPATH**/ ?>