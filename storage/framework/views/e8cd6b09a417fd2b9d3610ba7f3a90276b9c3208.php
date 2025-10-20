<?php if(Auth::user()->hasAnyRole(['consultant'])): ?>
     <?php if (isset($component)) { $__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuSection::class, ['title' => ''.e(__('Личный кабинет')).'']); ?>
<?php $component->withName('menu-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6)): ?>
<?php $component = $__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6; ?>
<?php unset($__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

     <?php if (isset($component)) { $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuItem::class, ['link' => ''.e(route('consultant.business_card')).'','title' => ''.e(__('Визитка')).'','icon' => 'la la-address-card']); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3)): ?>
<?php $component = $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3; ?>
<?php unset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($component)) { $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuItem::class, ['link' => ''.e(route('consultant.meeting_schedule')).'','title' => ''.e(__('График')).'','icon' => 'la la-calendar']); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3)): ?>
<?php $component = $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3; ?>
<?php unset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($component)) { $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuItem::class, ['link' => ''.e(route('consultations.list')).'','title' => ''.e(__('Консультации')).'','icon' => 'la la-headphones']); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3)): ?>
<?php $component = $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3; ?>
<?php unset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

    <?php if(!Auth::user()->isAdmin): ?>
        <li class="menu-item menu-item-submenu <?php if(request()->is('results/*')): ?> menu-item-open <?php endif; ?> " aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon">
                    <i class="la la-certificate"></i>
                </span>
                <span class="menu-text"><?php echo e(__('Результаты')); ?></span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu" kt-hidden-height="200" style="">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                     <?php if (isset($component)) { $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuItem::class, ['link' => ''.e(route('results.student_questionnaire')).'','title' => ''.e(__('Анкеты учащихся')).'','icon' => 'la la-minus']); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3)): ?>
<?php $component = $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3; ?>
<?php unset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                     <?php if (isset($component)) { $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuItem::class, ['link' => ''.e(route('results.parent_questionnaire')).'','title' => ''.e(__('Анкеты родителей')).'','icon' => 'la la-minus']); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3)): ?>
<?php $component = $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3; ?>
<?php unset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <li class="menu-item menu-item-submenu <?php if(request()->is('events*')): ?> menu-item-open <?php endif; ?> " aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon">
                    <i class="la la-calendar-check"></i>
                </span>
            <span class="menu-text"><?php echo e(__('Мероприятия')); ?></span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu" kt-hidden-height="200" style="">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                 <?php if (isset($component)) { $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuItem::class, ['link' => ''.e(route('events.view')).'','title' => ''.e(__('Список моих мероприятий')).'','icon' => 'la la-minus']); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3)): ?>
<?php $component = $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3; ?>
<?php unset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                 <?php if (isset($component)) { $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuItem::class, ['link' => ''.e(route('events.invites.view')).'','title' => ''.e(__('Приглашения на мероприятия')).'','icon' => 'la la-minus']); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3)): ?>
<?php $component = $__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3; ?>
<?php unset($__componentOriginald4a267de86f383005249ca2a9a99cedcc60162e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </ul>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/layout/partials/_aside/_menu-consultant.blade.php ENDPATH**/ ?>