<div class="row align-items-start col-md-12">
     <?php if (isset($component)) { $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select2::class, ['classes' => 'col-md-6','name' => 'school[]','id' => 'school','placeholder' => 'Компания','label' => 'Компания','event' => 'filterBySchool','multiple' => true,'indexUrl' => ''.e(route('employer.stages_tests_and_consultations.schools')).'','showUrl' => '/employer/stages_tests_and_consultations/schools','value' => ''.e(is_array(request()->school) ? implode(',', request()->school) : '').'']); ?>
<?php $component->withName('tables.filter-inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774)): ?>
<?php $component = $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774; ?>
<?php unset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

     <?php if (isset($component)) { $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select2::class, ['classes' => 'col-md-6','name' => 'class[]','id' => 'class','placeholder' => 'Структурное подразделение','label' => 'Структурное подразделение','event' => 'filterByClass','multiple' => true,'indexUrl' => ''.e(route('employer.stages_tests_and_consultations.classes')).'','showUrl' => '/employer/stages_tests_and_consultations/classes','value' => ''.e(is_array(request()->class) ? implode(',', request()->class) : '').'']); ?>
<?php $component->withName('tables.filter-inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774)): ?>
<?php $component = $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774; ?>
<?php unset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
</div>

 <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'year','id' => 'year','label' => 'Год оценки','items' => $years,'value' => ''.e(request()->year).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Год оценки']); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

 <?php if (isset($component)) { $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select2::class, ['classes' => 'col-md-4','name' => 'city','id' => 'city','placeholder' => 'Город','label' => 'Город','event' => 'filterByRole','indexUrl' => ''.e(route('kladr.used_cities', ['role' => 'student'])).'','showUrl' => '/kladr/cities','value' => ''.e(request()->city).'']); ?>
<?php $component->withName('tables.filter-inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774)): ?>
<?php $component = $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774; ?>
<?php unset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

 <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'gender','id' => 'gender','label' => 'Пол','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Мужской', 'value' => 'men'], ['title' => 'Женский', 'value' => 'women']],'value' => ''.e(request()->gender).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Пол']); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

 <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'age','id' => 'age','label' => 'Возраст','items' => $studentsAge,'value' => ''.e(request()->age).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Возраст']); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 








<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/employer/_dashboard/search.blade.php ENDPATH**/ ?>