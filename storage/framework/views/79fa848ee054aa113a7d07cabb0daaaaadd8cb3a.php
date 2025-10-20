 <?php if (isset($component)) { $__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Input::class, ['id' => 'q','name' => 'q','classes' => 'col-md-12','icon' => 'la la-search','label' => ''.e(__('Поиск по ФИО')).'','placeholder' => ''.e(__('Поиск по ФИО')).'','value' => ''.e(request()->q).'']); ?>
<?php $component->withName('tables.filter-inputs.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436)): ?>
<?php $component = $__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436; ?>
<?php unset($__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

<br>

<div class="col-xl-7 my-2">

     <?php if (isset($component)) { $__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Select2::class, ['id' => 'activity_kind_id','name' => 'activity_kind_id[]','required' => true,'title' => 'Соответствие профилю 1','placeholder' => 'Выбор профиля','event' => 'setActivityKindId','multiple' => true,'value' => ''.e(is_array(request()->activity_kind_id) ? implode(',', request()->activity_kind_id) : '').'','url' => ''.e(route('orgunits.activity_kinds.view')).'','selectedUrl' => '/orgunits/activity_kinds']); ?>
<?php $component->withName('inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d)): ?>
<?php $component = $__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d; ?>
<?php unset($__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> </div>


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
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'parent_questionnaire','id' => 'parent_questionnaire','label' => 'Заполнена родительская анкета','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Заполнена', 'value' => 'finished'], ['title' => 'Не заполнена', 'value' => 'not_finished']],'value' => ''.e(request()->parent_questionnaire).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

 <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'student_questionnaire','id' => 'student_questionnaire','label' => 'Заполнена анкета ребенка','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Заполнена', 'value' => 'finished'], ['title' => 'Не заполнена', 'value' => 'not_finished']],'value' => ''.e(request()->student_questionnaire).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

<?php if(request('type') != 'base_test'): ?>
     <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'base_tests','id' => 'base_tests','label' => 'Базовый тест','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Пройден', 'value' => 'finished'], ['title' => 'Проходит', 'value' => 'processed'], ['title' => 'Не пройден', 'value' => 'not_finished']],'value' => ''.e(request()->base_tests).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php endif; ?>

<?php if(request('type') != 'invite_depth_test'): ?>
     <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'invited_depth_tests','id' => 'invited_depth_tests','label' => 'Приглашен на глубинное тестирование','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Приглашен', 'value' => 'invited'], ['title' => 'Не приглашен', 'value' => 'not_invited']],'value' => ''.e(request()->invited_depth_tests).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php endif; ?>

<?php if(request('type') != 'depth_test'): ?>
     <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'depth_tests','id' => 'depth_tests','label' => 'Углубленный тест','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Пройден', 'value' => 'finished'], ['title' => 'Проходит', 'value' => 'processed'], ['title' => 'Не пройден', 'value' => 'not_finished']],'value' => ''.e(request()->depth_tests).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php endif; ?>

<?php if(request('type') != 'got_consultation'): ?>
     <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'child_got_consultation','id' => 'child_got_consultation','label' => 'Ребенок получил консультацию','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Получил', 'value' => 'carried_out'], ['title' => 'Приглашен', 'value' => 'invited'], ['title' => 'Не получил', 'value' => 'not_invited']],'value' => ''.e(request()->child_got_consultation).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

     <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'got_consultation_with_parent','id' => 'got_consultation_with_parent','label' => 'Родитель получил консультацию','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Получил', 'value' => 'carried_out'], ['title' => 'Приглашен', 'value' => 'invited'], ['title' => 'Не получил', 'value' => 'not_invited']],'value' => ''.e(request()->got_consultation_with_parent).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php endif; ?>

<?php if(request('type') != 'target_selection_depth_step'): ?>
     <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'depth_selection','id' => 'depth_selection','label' => 'Отбор по глубинному тесту','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Целевой', 'value' => 'target'], ['title' => 'Частично целевой', 'value' => 'partially_target'], ['title' => 'Не целевой', 'value' => 'not_target']],'value' => ''.e(request()->depth_selection).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php endif; ?>

 <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'recommend','id' => 'recommend','label' => 'Рекомендован','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Рекомендован', 'value' => 'recommend'], ['title' => 'Не рекомендован', 'value' => 'not_recommend']],'value' => ''.e(request()->recommend).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

 <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['classes' => 'col-md-4','name' => 'agree','id' => 'agree','label' => 'Согласие на целевое обучение','items' => [['title' => 'Показать все', 'value' => 'all'], ['title' => 'Согласен', 'value' => 'agree'], ['title' => 'Думает', 'value' => 'think'], ['title' => 'Не согласен', 'value' => 'not_agree']],'value' => ''.e(request()->agree).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

<input type="text" name="gender" value="<?php echo e(request('gender')); ?>" hidden>
<input type="text" name="age" value="<?php echo e(request('age')); ?>" hidden>
<input type="text" name="trait" value="<?php echo e(request('trait')); ?>" hidden>
<input type="text" name="year" value="<?php echo e(request('year')); ?>" hidden>
<input type="text" name="type" value="<?php echo e(request('type')); ?>" hidden>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/employer/reports/_students/search.blade.php ENDPATH**/ ?>