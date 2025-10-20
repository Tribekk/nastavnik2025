<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Отчет по базе наставников']); ?>
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
    <?php


        function clearUrl(string $routeName, bool $clearType = true): string {
            $params = $_GET;
            if($clearType) unset($params['type']);
            unset($params['q']);
            unset($params['page']);
            unset($params['school']);
            unset($params['class']);
            unset($params['parent_questionnaire']);
            unset($params['student_questionnaire']);
            unset($params['base_tests']);
            unset($params['base_selection']);
            unset($params['invited_depth_tests']);
            unset($params['depth_tests']);
            unset($params['child_got_consultation']);
            unset($params['got_consultation_with_parent']);
            unset($params['depth_selection']);
            unset($params['recommend']);
            unset($params['agree']);
            return urldecode(route($routeName, $params));
        }
    ?>
<style>
    .text-success{
        color: green !important;
    }
</style>
    <div class="container">
         <?php if (isset($component)) { $__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Filters::class, ['clearHref' => ''.clearUrl('employer.reports.students', false).'']); ?>
<?php $component->withName('tables.filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php echo $__env->make('employer.reports._students.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php if (isset($__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0)): ?>
<?php $component = $__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0; ?>
<?php unset($__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php if (isset($component)) { $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Card::class, []); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>
             <?php $__env->slot('toolbar'); ?> 
                <div class="d-flex align-items-start">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('employer.sync-reports-data', ['label' => ''.e($latestSyncDataLabel).''])->html();
} elseif ($_instance->childHasBeenRendered('xdA3DxD')) {
    $componentId = $_instance->getRenderedChildComponentId('xdA3DxD');
    $componentTag = $_instance->getRenderedChildComponentTagName('xdA3DxD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xdA3DxD');
} else {
    $response = \Livewire\Livewire::mount('employer.sync-reports-data', ['label' => ''.e($latestSyncDataLabel).'']);
    $html = $response->html();
    $_instance->logRenderedChild('xdA3DxD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php if(request('type', false)): ?>
                         <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.clearUrl('dashboard').'','title' => 'Вернуться назад']); ?>
<?php $component->withName('inputs.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f)): ?>
<?php $component = $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f; ?>
<?php unset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    <?php endif; ?>
                </div>
             <?php $__env->endSlot(); ?>

            <div class="button-group">
                <button class="btn btn-success px-4 mt-1" onclick="sendNotify()">Отправить сообщение</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteEvent()">Пригласить на мероприятие</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(null, 'base')">Пригласить на базовое тестирование</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(null, 'depth')">Пригласить на углубленное тестирование</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(null, 'personal_quiz')">Пригласить на квиз</button>
                           </div>


            <?php if($users->count()): ?>
               <?php echo $__env->make('employer.reports._students._table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                 <?php if (isset($component)) { $__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\EmptyAlert::class, ['text' => ''.e(__('По вашему запросу не найдено ни одного наставника.')).'']); ?>
<?php $component->withName('tables.empty-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb)): ?>
<?php $component = $__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb; ?>
<?php unset($__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php endif; ?>
         <?php if (isset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8)): ?>
<?php $component = $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8; ?>
<?php unset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/employer/reports/students.blade.php ENDPATH**/ ?>