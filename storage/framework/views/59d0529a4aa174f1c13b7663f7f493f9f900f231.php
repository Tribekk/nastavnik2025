<div class="card card-custom">
    <div class="card-header">
        <div class="card-title font-weight-bold font-size-h3 text-primary">
            <?php echo $school->short_title; ?>

        </div>
    </div>
    <div class="card-body">
        <p><b>Тип организации:</b> <?php echo e($school->typeEducationOrganization->title); ?></p>
        <p><b>Основание взаимодействия /  Номер договора:</b> <?php echo e($school->number); ?></p>
        <?php if($school->director): ?>
            <p><b>ФИО директора:</b>  <?php echo e($school->director); ?></p>
        <?php endif; ?>
        <?php if($school->phone): ?>
            <p><b>Телефон:</b>  <?php echo e($school->phone); ?></p>
        <?php endif; ?>
        <?php if($school->email): ?>
            <p><b>Почта:</b>  <?php echo e($school->email); ?></p>
        <?php endif; ?>
        <hr>
        <p><b>Руководители структурных подразделений:</b></p>
        <?php $__empty_1 = true; $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div>
                <?php echo e($class->number); ?><?php echo e($class->letter); ?> (год: <?php echo e($class->year ?? 'не указан'); ?>) -

                <?php if(Auth::user()->hasRole('teacher')): ?>
                    <?php echo e(Auth::user()->fullName); ?>

                <?php else: ?>
                    <?php $__empty_2 = true; $__currentLoopData = $class->curators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <?php echo e($curator->user->fullName); ?><?php echo e(!$loop->last ? ', ' : '.'); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <span class="text-muted">На данный момент нет руководителя.</span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <span class="text-muted">На данный момент структурные подразделения отсутствуют<?php echo e(Auth::user()->hasRole('teacher') ? " или вы не являетесь руководителем структурного подразделения(ов)" : ''); ?>.</span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/school/card.blade.php ENDPATH**/ ?>