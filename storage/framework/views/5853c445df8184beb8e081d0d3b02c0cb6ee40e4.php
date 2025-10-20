<form class="form" method="POST" action="<?php echo e(route('attach.consultant')); ?>">
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
        <label for="regalia_and_experience" class="text-dark font-size-h4 required">Ваши регалии и опыт в области профориентации, карьерного консультирования, психологии, HR и т.п.:</label>
         <?php if (isset($component)) { $__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\SummernoteEditor::class, ['id' => 'regalia_and_experience','name' => 'regalia_and_experience','required' => true]); ?>
<?php $component->withName('inputs.summernote-editor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07)): ?>
<?php $component = $__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07; ?>
<?php unset($__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>

    <div class="form-group">
        <label for="experience" class="text-dark font-size-h4 required">Ваш суммарный опыт работы:</label>
         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['type' => 'number','min' => '1','name' => 'experience','id' => 'experience']); ?>
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
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/type/_consultant-form.blade.php ENDPATH**/ ?>