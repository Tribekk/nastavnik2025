<div class="form-group">
    <?php if($title): ?>
    <label for="<?php echo e($id); ?>" class="font-size-h6 font-weight-bolder text-dark <?php if($required): ?> required <?php endif; ?>"><?php echo e($title); ?></label>
    <?php endif; ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'','id' => ''.e($id).'','url' => ''.e($url).'','event' => ''.e($event).'','placeholder' => ''.e($placeholder).'','selected' => ''.e($value).'','multiple' => ''.e($multiple).'','selectedItemUrl' => ''.e($selectedUrl).''])->html();
} elseif ($_instance->childHasBeenRendered('F5cO3UA')) {
    $componentId = $_instance->getRenderedChildComponentId('F5cO3UA');
    $componentTag = $_instance->getRenderedChildComponentTagName('F5cO3UA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('F5cO3UA');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'','id' => ''.e($id).'','url' => ''.e($url).'','event' => ''.e($event).'','placeholder' => ''.e($placeholder).'','selected' => ''.e($value).'','multiple' => ''.e($multiple).'','selectedItemUrl' => ''.e($selectedUrl).'']);
    $html = $response->html();
    $_instance->logRenderedChild('F5cO3UA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div wire:ignore>
        <?php $__errorArgs = [strArrToPath($name)];
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
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/inputs/select2.blade.php ENDPATH**/ ?>