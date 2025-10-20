<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Профтрекер']); ?>
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

<?php
    function getUrlParams(): array {
        $params = $_GET;
        unset($params['page']);
        return $params;
    }

    function reportUrl($routeName, $type): string {
        $params = getUrlParams();
        $params['type'] = $type;
        return route($routeName, $params);
    }
?>

<?php $__env->startSection('content'); ?>


    <?php

        if(Auth::user()) {
            $user=Auth::user();
            if($user->orgunit) {
                $orgunit=$user->orgunit;


                if(!empty($orgunit->profile_target)) {
                    $orgunit->profile_target=unserialize($orgunit->profile_target);
                } else {
                    $orgunit->profile_target=array('');
                }
            }
        }

    ?>


    <div class="container">
       <table>
           <tr>
               <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <td>
                   <a href="<?php echo e(route('employer.reports.students')); ?>">
                   <div style="width:300px;height:250px;padding:15px;border:1px solid black;border-radius:5px;margin-left:10px">
                       <b><?php echo e($profile->title); ?></b>
                        <br>
                        <br>
                        <br>



                       Потребность - <?php echo e(@$orgunit->profile_target[$profile->id]); ?><br><br>
                       Зарегистрировано - <?php echo e(@$user_profiles[$profile->id]["registration_count"]["count"]*1); ?><br>
                       Базовый отбор - <?php echo e(@$user_profiles[$profile->id]["baseTest"]["count"]*1); ?><br>
                       Консультации - 0<br>
                       Целевой отбор - <?php echo e(round(@$user_profiles[$profile->id]["baseTest"]["count"]*0.4)); ?><br>
                       Меропрития - 0

                   </div>
                   </a>

               </td>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tr>
       </table>


        <br><br>




         <?php if (isset($component)) { $__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Filters::class, ['clearHref' => ''.e(route('dashboard')).'']); ?>
<?php $component->withName('tables.filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php echo $__env->make('employer._dashboard.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
             <?php $__env->slot('title'); ?> Этапы тестов и консультаций <?php $__env->endSlot(); ?>
             <?php $__env->slot('toolbar'); ?> 
                <div class="d-flex align-items-start">
                    <?php echo csrf_field(); ?>
                     <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-success','icon' => 'la-cog','link' => ''.e(route('dashboard.settings')).'','title' => ''.e(__('Настройки')).'']); ?>
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
                     <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-success','icon' => 'la-file-pdf','link' => ''.e(route('employer.reports.students.generate_pdf', getUrlParams())).'','title' => ''.e(__('Открыть для печати PDF')).'']); ?>
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
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('employer.sync-reports-data', ['label' => ''.e($latestSyncDataLabel).''])->html();
} elseif ($_instance->childHasBeenRendered('ymAUt8G')) {
    $componentId = $_instance->getRenderedChildComponentId('ymAUt8G');
    $componentTag = $_instance->getRenderedChildComponentTagName('ymAUt8G');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ymAUt8G');
} else {
    $response = \Livewire\Livewire::mount('employer.sync-reports-data', ['label' => ''.e($latestSyncDataLabel).'']);
    $html = $response->html();
    $_instance->logRenderedChild('ymAUt8G', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
             <?php $__env->endSlot(); ?>

            <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e($message).'']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php if(!isset($studentsCount) && !isset($registrationStudentsCount) && !isset($baseTest) && !isset($inviteDepthTest) && !isset($depthTest) && !isset($gotConsultation) && !isset($parentRegistration) && !isset($recommend) && !isset($matchedSelectionBaseStep) && !isset($targetSelectionDepthStep)): ?>
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => 'Вы отключили все отображаемые пункты','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php endif; ?>

            <?php if(isset($studentsCount)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-silver',
                    'title' => 'Списочная численность кандидатов',
                    'percentage' => $studentsCount['percentage'],
                    'value' => $studentsCount['count'],
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($registrationStudentsCount)): ?>
                <?php
                //dd($registrationStudentsCount);
                ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                   'color' => 'progress-orange',
                   'title' => 'Зарегистрированы наставники',
                   'percentage' => $registrationStudentsCount['percentage'],
                   'value' => $registrationStudentsCount['count'],
                   'href' => reportUrl('employer.reports.students', 'registration_students_count'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($questionnaireStudentsCount)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Прошли анкету',
                    'percentage' => $questionnaireStudentsCount['percentage'],
                    'value' => $questionnaireStudentsCount['count'],
                    'href' => reportUrl('employer.reports.students', 'questionnaire_students'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($CasesQuestionsStudentsCount)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Решили кейсы и тесты на оценку Soft и Hard',
                    'percentage' => $CasesQuestionsStudentsCount['percentage'],
                    'value' => $CasesQuestionsStudentsCount['count'],
                    'href' => reportUrl('employer.reports.students', 'cases_questions_students'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($modelCompetenceRange31to100)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Соответствуют модели компетенций  от 31 до 100%',
                    'percentage' => $modelCompetenceRange31to100['percentage'],
                    'value' => $modelCompetenceRange31to100['count'],
                    'href' => reportUrl('employer.reports.students', 'model_competence_range_31_to_100'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($participatedEvents)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Участвовали в мероприятиях',
                    'percentage' => $participatedEvents['percentage'],
                    'value' => $participatedEvents['count'],
                    'href' => reportUrl('employer.reports.students', 'participated_events'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>











            <?php if(isset($inviteDepthTest)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Приглашены на углубленные тесты',
                    'percentage' => $inviteDepthTest['percentage'],
                    'value' => $inviteDepthTest['count'],
                    'href' => reportUrl('employer.reports.students', 'invite_depth_test'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($depthTest)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Прошли углубленные тесты',
                    'percentage' => $depthTest['percentage'],
                    'value' => $depthTest['count'],
                    'href' => reportUrl('employer.reports.students', 'depth_test'),
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($targetSelectionDepthStep)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-light-green',
                    'title' => 'Соответствуют целевому профилю',
                    'percentage' => $targetSelectionDepthStep['percentage'],
                    'value' => $targetSelectionDepthStep['count'],
                    'href' => reportUrl('employer.reports.students', 'target_selection_depth_step'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($gotConsultation)): ?>
                <?php echo $__env->make('employer._dashboard._consultation-progress-bar', [
                    'title' => 'Получили консультацию HR / консультанта / психолога',
                    'percentageChild' => $gotConsultation['percentage_child'],
                    'valueChild' => $gotConsultation['count_child'],
                    'percentageParent' => $gotConsultation['percentage_parent'],
                    'valueParent' => $gotConsultation['count_parent'],
                    'href' => reportUrl('employer.reports.students', 'got_consultation'),
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>











            <?php if(isset($recommend)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-green',
                    'title' => 'Рекомендованы',
                    'percentage' => $recommend['percentage'],
                    'value' => $recommend['count'],
                    'href' => reportUrl('employer.reports.students', 'recommend'),
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="separator separator-solid my-7"></div>

            <h5 class="font-size-h5 font-weight-bold mb-8">Итоги отбора</h5>

            <?php if(!isset($proposedAdmission) && !isset($appliedAdmission) && !isset($enrolledProfileUZ) && !isset($concludedTargetAgreement)): ?>
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => 'Вы отключили все отображаемые пункты','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php endif; ?>

            <?php if(isset($proposedAdmission)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-blue',
                    'title' => 'Прошел тестирование, кейсы и анкету',
                    'percentage' => $proposedAdmission['percentage'],
                    'value' => $proposedAdmission['count'],
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($appliedAdmission)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-blue',
                    'title' => 'Назначено обучение',
                    'percentage' => $appliedAdmission['percentage'],
                    'value' => $appliedAdmission['count'],
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($enrolledProfileUZ)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-blue',
                    'title' => 'Прошел обучение ',
                    'percentage' => $enrolledProfileUZ['percentage'],
                    'value' => $enrolledProfileUZ['count'],
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isset($concludedTargetAgreement)): ?>
                <?php echo $__env->make('employer._dashboard.progress-bar', [
                    'color' => 'progress-green',
                    'title' => 'Присвоен статус наставника',
                    'percentage' => $concludedTargetAgreement['percentage'],
                    'value' => $concludedTargetAgreement['count'],
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
         <?php if (isset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8)): ?>
<?php $component = $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8; ?>
<?php unset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 




    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/employer/dashboard.blade.php ENDPATH**/ ?>