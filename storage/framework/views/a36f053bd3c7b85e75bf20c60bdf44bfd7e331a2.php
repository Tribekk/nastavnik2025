<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        <?php echo $__env->make('school.classes._show_table._table-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('school.classes._show_table._table-body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </table>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/school/classes/_show_table/_table.blade.php ENDPATH**/ ?>