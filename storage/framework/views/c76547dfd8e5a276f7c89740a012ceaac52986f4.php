<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        <?php echo $__env->make('admin.reports._tests._table-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.reports._tests._table-body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>

     <?php if (isset($component)) { $__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Pagination::class, ['items' => $results]); ?>
<?php $component->withName('tables.pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10)): ?>
<?php $component = $__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10; ?>
<?php unset($__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/reports/_tests/_table.blade.php ENDPATH**/ ?>