<div class="table-responsive" id="responsive-table">
    <table class="table lk-table" id="tttt">
        <?php echo $__env->make('employer.reports._students._table-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('employer.reports._students._table-body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>

    <script>
        function save_personal_notes(user_id, type) {


            var note=document.getElementById('personal_notes_'+user_id + '_'+ type).value;


            $.ajax({
                url: '/orgunit/save_personal_notes',
                type: 'POST' ,
                data: {note:note,user_id:user_id, type:type},

            }).done(function(result)  {



            });
        }
    </script>

     <?php if (isset($component)) { $__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Pagination::class, ['items' => $users]); ?>
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
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/employer/reports/_students/_table.blade.php ENDPATH**/ ?>