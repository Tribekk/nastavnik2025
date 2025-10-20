<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Профтрекер']); ?>
<?php $component->withName('subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b)): ?>
<?php $component = $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b; ?>
<?php unset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(Auth::user()->school_id): ?>
            <?php if(Auth::user()->hasRole('curator')): ?>
                <div class="mb-8">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('school.class-container', ['school' => $school])->html();
} elseif ($_instance->childHasBeenRendered('J4bcuP6')) {
    $componentId = $_instance->getRenderedChildComponentId('J4bcuP6');
    $componentTag = $_instance->getRenderedChildComponentTagName('J4bcuP6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('J4bcuP6');
} else {
    $response = \Livewire\Livewire::mount('school.class-container', ['school' => $school]);
    $html = $response->html();
    $_instance->logRenderedChild('J4bcuP6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:school.class-container>
                </div>
            <?php endif; ?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('school.card', ['school' => $school])->html();
} elseif ($_instance->childHasBeenRendered('GfeaOnh')) {
    $componentId = $_instance->getRenderedChildComponentId('GfeaOnh');
    $componentTag = $_instance->getRenderedChildComponentTagName('GfeaOnh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GfeaOnh');
} else {
    $response = \Livewire\Livewire::mount('school.card', ['school' => $school]);
    $html = $response->html();
    $_instance->logRenderedChild('GfeaOnh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:school.card>
        <?php else: ?>
            <div class="card">
                <div class="card-header">
                    <h1 class="font-hero font-size-h4 text-primary">Карточка компании</h1>
                </div>
                <div class="card-body">
                     <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'info','text' => 'Для дальнейшего использования учётной записи требуется привязка компании','close' => false]); ?>
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
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/school/card.blade.php ENDPATH**/ ?>