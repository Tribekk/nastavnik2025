<div class="pb-5" data-wizard-type="step-content" <?php if($step == "first"): ?> data-wizard-state="current" <?php endif; ?>>
    <h2 class="font-size-h2  font-alla font-pixel mb-5">
        Запланируйте время консультации
    </h2>

    <h3 class="font-size-h5 font-hero mb-2">
        Когда Вам и <?php echo e(Auth::user()->hasRole('parent') ? 'ребенку' : 'родителю'); ?> удобно подключиться к онлайн-встрече продолжительностью 1-1,5 часа?
    </h3>
    <p class="mt-2 font-size-h5 font-brown-light mb-8">
        
    </p>


    <?php if(Auth::user()->hasRole('parent')): ?>
        <?php if(count($children) == 0): ?>
            <div class="mb-8">
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'light-danger','text' => 'Ребенок обязан пройти глубинное тестирование для получения консультации','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                <a href="<?php echo e(route('observe.user')); ?>" class="btn btn-primary">Привязать аккаунт ребенка</a>
            </div>
        <?php endif; ?>

        <div class="<?php if(count($children) <= 1): ?> d-none <?php endif; ?>">
             <?php if (isset($component)) { $__componentOriginalec4e7c2b7732157c812928c5165529797836140c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Select::class, ['title' => 'Выберите ребенка','required' => true,'values' => $children,'model' => 'child_id','name' => 'child_id','id' => 'child_id']); ?>
<?php $component->withName('inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalec4e7c2b7732157c812928c5165529797836140c)): ?>
<?php $component = $__componentOriginalec4e7c2b7732157c812928c5165529797836140c; ?>
<?php unset($__componentOriginalec4e7c2b7732157c812928c5165529797836140c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        </div>
    <?php else: ?>
        <?php if(!Auth::user()->finishedDepthTests): ?>
            <div class="mb-8">
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'light-danger','text' => 'Необходимо пройти глубинные тесты перед тем как записываться на консультацию.','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </div>
        <?php endif; ?>
    <?php endif; ?>

     <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Выберите день','required' => true,'placeholder' => 'Дата','datePicker' => true,'model' => 'date_at','name' => 'date_at','id' => 'date_at']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

    <?php if(count($timeIntervals)): ?>
         <?php if (isset($component)) { $__componentOriginalec4e7c2b7732157c812928c5165529797836140c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Select::class, ['title' => 'Выберите время (по уральскому времени)','required' => true,'values' => $timeIntervals,'model' => 'time_interval_id','name' => 'time_interval_id','id' => 'time_interval_id']); ?>
<?php $component->withName('inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalec4e7c2b7732157c812928c5165529797836140c)): ?>
<?php $component = $__componentOriginalec4e7c2b7732157c812928c5165529797836140c; ?>
<?php unset($__componentOriginalec4e7c2b7732157c812928c5165529797836140c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    <?php elseif($date_at): ?>
         <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'light-danger','text' => 'На выбранный Вами день нет консультантов','close' => false]); ?>
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
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#date_at').on('change', function(e) {
            window.livewire.find('<?php echo e($_instance->id); ?>').call('setDate', e.target.value);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/consultations/_record-form/first-step.blade.php ENDPATH**/ ?>