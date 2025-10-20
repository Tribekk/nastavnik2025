<div class="d-flex">
    <div class="my-2 mx-2 p-md-3 p-2 cursor-pointer d-flex justify-content-center align-items-center hover-opacity-50 <?php if($value === 'frown'): ?> border-secondary <?php endif; ?>"
         style="border: 2px solid transparent; border-radius: 12px;"
         wire:click="setValue('frown')">
        <i class="las la-frown text-warning" style="font-size: 45px;"></i>
    </div>

    <div class="my-2 mx-2 p-md-3 p-2 cursor-pointer d-flex justify-content-center align-items-center hover-opacity-50 <?php if($value === 'meh'): ?> border-secondary <?php endif; ?>"
         style="border: 2px solid transparent; border-radius: 12px;"
         wire:click="setValue('meh')">
        <i class="las la-meh font-blue" style="font-size: 45px;"></i>
    </div>

    <div class="my-2 mx-2 p-md-3 p-2 cursor-pointer d-flex justify-content-center align-items-center hover-opacity-50 <?php if($value === 'smile'): ?> border-secondary <?php endif; ?>"
         style="border: 2px solid transparent; border-radius: 12px;"
         wire:click="setValue('smile')">
        <i class="las la-smile font-alla" style="font-size: 45px;"></i>
    </div>

    <input type="text" name="<?php echo e($name); ?>" id="<?php echo e($inputId); ?>" value="<?php echo e($value); ?>" hidden>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/feedback/mark-emotions.blade.php ENDPATH**/ ?>