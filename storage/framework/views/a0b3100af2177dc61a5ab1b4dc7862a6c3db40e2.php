<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Приглашения на мероприятие']); ?>
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
         <?php if (isset($component)) { $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Card::class, []); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('title'); ?> <?php echo e($eventInvite->event->title); ?> <?php $__env->endSlot(); ?>
             <?php $__env->slot('toolbar'); ?> 
                <form action="<?php echo e(route('events.invites.destroy', $eventInvite)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button
                        type="submit"
                        class="btn btn-danger px-4 py-2 my-1 mr-1"
                        onclick="return confirm('Вы действительно хотите удалить приглашение?')"
                    >
                        Удалить
                    </button>
                </form>
             <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Организатор</div>
                            <div class="font-size-h6"><?php echo e($eventInvite->event->orgunit->title); ?></div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Формат проведения</div>
                            <div class="font-size-h6"><?php echo e($eventInvite->event->format->title); ?></div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Направление</div>
                            <?php $__currentLoopData = $eventInvite->event->directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="font-size-h6"><?php echo e($direction->direction->title); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Статус мероприятия</div>
                            <div class="font-size-h6 mt-2 <?php echo e($eventInvite->eventState->color()); ?>"><?php echo e($eventInvite->eventState->title()); ?></div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Время начала</div>
                            <div class="font-size-h6 mt-2"><?php echo e($eventInvite->event->start_at->format('d.m.Y H:i')); ?></div>
                        </div>

                        <div class="my-3 col-md-4">
                            <div class="font-weight-bold font-size-h5">Время завершения</div>
                            <div class="font-size-h6 mt-2"><?php echo e($eventInvite->event->finish_at->format('d.m.Y H:i')); ?></div>
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="font-weight-bold font-size-h5">Аудитория</div>
                        <div class="button-group mt-2">
                            <?php $__currentLoopData = $eventInvite->event->audience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="btn-secondary btn btn-sm" style="font-size: 14px;"><?php echo e($item->audience->title); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <?php if($eventInvite->event->location): ?>
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Место проведения</div>
                            <div class="font-size-h6"><?php echo e($eventInvite->event->location); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if($eventInvite->event->program): ?>
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Программа мероприятия</div>
                            <div class=""><?php echo $eventInvite->event->program; ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if($eventInvite->event->attachedFiles): ?>
                        <div class="my-3 mt-6">
                            <div class="font-weight-bold font-size-h5">Прикрепленные файлы</div>
                            <div class="mt-3">
                                <?php $__currentLoopData = $eventInvite->event->attachedFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('attached_files.download')); ?>?path=<?php echo e(urlencode($file->path)); ?>" class="font-size-h6 d-inline-block mx-2 link">
                                        <div class="d-inline text-break my-1"><?php echo e($file->onlyFileName); ?></div>
                                        <i class="la la-download ml-2"></i>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($eventInvite->state->is(\Domain\Event\States\EventInvite\PendingEventInviteState::class)): ?>
                <div class="mt-4 button-group">
                    <form action="<?php echo e(route('events.invites.accept', $eventInvite)); ?>" method="post" class="d-inline-block">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <button
                            type="submit"
                            class="btn btn-success px-4 py-2 my-1 mr-1"
                            onclick="return confirm('Вы действительно хотите принять приглашение?')"
                        >
                            <i class="la la-check"></i> Подтвердить участие
                        </button>
                    </form>

                    <form action="<?php echo e(route('events.invites.cancel', $eventInvite)); ?>" method="post" class="d-inline-block">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <button
                            type="submit"
                            class="btn btn-primary px-4 py-2 my-1 mr-1"
                            onclick="return confirm('Вы действительно хотите отклонить приглашение?')"
                        >
                            <i class="la la-times"></i> Отказаться от участия
                        </button>
                    </form>
                     <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['title' => 'Вернуться назад','type' => 'btn-outline-success','link' => ''.e(route('events.invites.view')).'']); ?>
<?php $component->withName('inputs.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f)): ?>
<?php $component = $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f; ?>
<?php unset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                </div>
            <?php else: ?>
                <div class="button-group mt-4">
                     <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['title' => 'Вернуться назад','type' => 'btn-outline-success','link' => ''.e(route('events.invites.view')).'']); ?>
<?php $component->withName('inputs.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f)): ?>
<?php $component = $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f; ?>
<?php unset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                </div>
            <?php endif; ?>
         <?php if (isset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8)): ?>
<?php $component = $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8; ?>
<?php unset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/events/user/invites/show.blade.php ENDPATH**/ ?>