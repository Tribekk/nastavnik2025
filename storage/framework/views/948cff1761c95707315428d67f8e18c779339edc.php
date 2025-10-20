<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="max-w-md-500px text-center mb-6">



                <div class="text-left mt-8">
                    <h3 class="font-weight-bold font-blue font-size-h2 mb-2">ДЕМОГРАФИЧЕСКИЙ ПОРТРЕТ</h3>
                    <p class="font-size-h4 text-dark">Общие сведения</p>
                </div>

                <div class="text-left mt-8">
                    <h3 class="font-weight-bold font-blue font-size-h2 mb-2">МОТИВЫ ВЫБОРА</h3>
                    <p class="font-size-h4 text-dark">О вас</p>
                </div>

                
            </div>

            <div class="text-dark font-size-h3 mb-5 mb-md-0">
            <?php if($questionnaire && $questionnaire->quiz->caption): ?>
                <?php echo $questionnaire->quiz->caption; ?>

            <?php endif; ?></div>
        </div>
        <div class="col-md-4 align-self-center">
            <?php if($questionnaire && $questionnaire->state->fillable()): ?>
                <a href="<?php echo e(route('quiz.description', $questionnaire)); ?>" class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12">АНКЕТА</a>
            <?php else: ?>
                <form action="<?php echo e(route('quiz.supplement', $questionnaire)); ?>" method="post" class="col-12">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12">ИЗМЕНИТЬ АНКЕТУ</button>
                </form>
            <?php endif; ?>

            <span class="text-dark d-block text-center align-items-center col-12">
               Время заполнения: <?php echo e($questionnaire->quiz->minutes); ?> минут
            </span>
            <div class="d-flex flex-column">
                <a href="<?php echo e(route('quiz.results', ['backTo' => route('dashboard')])); ?>" class="col-12 btn btn-warning px-8 py-5 font-weight-bold my-2 rounded-pill">СМОТРЕТЬ РЕЗУЛЬТАТЫ</a>
                <div class="text-center my-2">
                    <a href="<?php echo e(route('quiz.view')); ?>" class="col-12 btn btn-warning px-8 py-5 w-100 font-weight-bold rounded-pill">ПРОЙТИ ТЕСТЫ</a>
                </div>
            </div>

                <?php if($personal_quiz_available>0): ?>
        <br><br><br>
               <h3>Вы приглашены на КВИЗ!</h3>
                        <a href="<?php echo e(route('orgunits.personal_quiz', $personal_quiz_available)); ?>" class="col-12 btn btn-warning px-8 py-5 font-weight-bold my-2 rounded-pill">Пройти КВИЗ</a>


                <?php endif; ?>

        </div>
    </div>
     <?php if(!Auth::user()->observers()->count()): ?>
         <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'light-info','text' => 'Далее необходимо пройти тесты и кейсы','close' => false]); ?>
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
</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/student/_dashboard/questionnaire-test-dashboard.blade.php ENDPATH**/ ?>