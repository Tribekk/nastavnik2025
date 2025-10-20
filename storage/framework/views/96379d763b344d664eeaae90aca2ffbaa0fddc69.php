<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Консультация']); ?>
<?php $component->withName('subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b)): ?>
<?php $component = $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b; ?>
<?php unset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="font-weight-bold font-hero font-size-h4 mb-0 text-primary">
                    Запись на консультацию
                </h1>
            </div>
            <div class="card-body">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('consultations.record-form', [])->html();
} elseif ($_instance->childHasBeenRendered('NhVfGh6')) {
    $componentId = $_instance->getRenderedChildComponentId('NhVfGh6');
    $componentTag = $_instance->getRenderedChildComponentTagName('NhVfGh6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NhVfGh6');
} else {
    $response = \Livewire\Livewire::mount('consultations.record-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('NhVfGh6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:consultations.record-form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/consultations/record_form.blade.php ENDPATH**/ ?>