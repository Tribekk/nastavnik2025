<tbody class="datatable-body">
<?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($participants->firstItem() + $index); ?>

        </td>

        <td>
            <div class="min-w-200px text-break"><?php echo e($item->user->fullName); ?></div>
        </td>

        <td>
            <div class="min-w-120px text-break"><?php echo e(optional($item->user->kladr)->name ?? 'Не указан'); ?></div>
        </td>

        <td>
            <div class="min-w-120px"><?php echo optional($item->user->school)->short_title ?? 'Не указана'; ?></div>
        </td>

        <td>
            <div class="">
                <?php if($item->user->class): ?>
                    <?php echo e($item->user->class->number); ?><?php echo e($item->user->class->letter); ?>

                <?php else: ?>
                    Не указан
                <?php endif; ?>
            </div>
        </td>

        <td>
            <div class="text-break min-w-120px max-w-120px">
                <?php if($item->user->phone): ?>
                    <div class="link cursor-pointer" onclick="$.sendSmsDialog('<?php echo e($item->user->phone); ?>')"><?php echo e($item->user->phone); ?></div>
                <?php else: ?>
                    <i class="la la-minus text-muted"></i>
                <?php endif; ?>
            </div>
        </td>

        <td class="">
            <div class="text-break min-w-200px max-w-200px">
                <?php if($item->user->email): ?>
                    <a target="_blank" class="link cursor-pointer" href="mailto:<?php echo e($item->user->email); ?>"><?php echo e($item->user->email); ?></a>
                <?php else: ?>
                    <i class="la la-minus text-muted"></i>
                <?php endif; ?>
            </div>
        </td>

        <td>


            <div class="min-w-225px">
                <div class="text-nowrap mb-2">
                    <?php if($item->visited): ?>
                        Посетил мероприятие
                    <?php else: ?>
                        Не посетил
                    <?php endif; ?>
                </div>
                <div class="text-left">
                    <?php if($item->visited): ?>
                        <form action="<?php echo e(route('employer.events.participants.state', $item)); ?>" method="post" class="mt-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <button onclick="return confirm('Вы действительно хотите изменить данные?')" class="btn btn-success min-w-225px" title="<?php echo e(__('Не посетил мероприятие')); ?>">
                                <span class="svg-icon svg-icon-md"><i class="la la-eye-slash"></i></span> Не посетил мероприятие
                            </button>
                            <input type="text" name="visited" value="0" hidden>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('employer.events.participants.state', $item)); ?>" method="post" class="">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <button onclick="return confirm('Вы действительно хотите изменить данные?')" class="btn btn-success min-w-225px" title="<?php echo e(__('Посетил мероприятие')); ?>">
                                <span class="svg-icon svg-icon-md"><i class="la la-eye"></i></span> Посетил мероприятие
                            </button>
                            <input type="text" name="visited" value="1" hidden>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($item->created_at->format('d.m.Y')); ?></div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($item->updated_at->format('d.m.Y')); ?></div>
        </td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/events/_participants/_table-body.blade.php ENDPATH**/ ?>