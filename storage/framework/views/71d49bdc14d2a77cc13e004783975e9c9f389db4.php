<div class="my-5">
     <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'attached_files','name' => 'attached_files[]','multiple' => true,'type' => 'file','title' => 'Прикрепить файлы','accept' => '.pdf']); ?>
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
    <div class="mt-10 border p-4">
        <h4 class="font-weight-bold font-size-h4">Прикрепленные файлы</h4>

        <div class="px-2">
            <?php $__empty_1 = true; $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="font-size-h6">
                    <div class="d-inline-block text-break my-1"><?php echo e($file->onlyFileName); ?></div>
                    <div class="button-group ml-sm-2 my-1 d-sm-inline-block">
                        <button wire:click.prevent="deleteFile(<?php echo e($file->id); ?>)" class="btn btn-danger btn-icon btn-xs">
                            <i class="la la-remove"></i>
                        </button>
                        <a href="<?php echo e($file->url); ?>" target="_blank" class="btn btn-success btn-xs btn-icon">
                            <i class="la la-eye"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="font-size-h6">Файлы не прикреплены</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/event/attached-files.blade.php ENDPATH**/ ?>