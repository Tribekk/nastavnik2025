<div class="d-flex py-3">
    
    <div class="mt-5">
        <h1 class="font-size-h1 font-pixel font-orange">Привет!<br>Приглашаем пройти следующий этап</h1>

        <ol class="mt-8 font-size-h5 p-5">
            <li class="font-weight-bold">Выделите 30-40 минут и пройдите еще 3 теста для получения расширенного портрета Ваших личностных качеств и мотивов;</li>
            <li class="">Далее Вы сможете получить консультацию психолога или HR-специалиста для разъяснения результатов и дополнения Вашего карьерного трека.</li>
        </ol>

        <?php
            $notResultQuizzes = Auth::user()->notResultQuizzes();
            $requiredToPass = "Чтобы дополнить ваш карьерный трек наставника, необходимо завершить:";
            $requiredToPass .= "<ul>";

            foreach ($notResultQuizzes as $quiz) {
                if (isset($quiz)){
                    $requiredToPass .= "<li>";
                    $requiredToPass .= $quiz->type == "form" ? 'Анкета' : 'Тест';
                    $requiredToPass .= " ".mb_strtolower($quiz->title);
                    $requiredToPass .= "</li>";
                }
                $requiredToPass .= "</ul>";
            }
        ?>
         <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'light-danger','text' => ''.$requiredToPass.'','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 





        <div class="mt-12 d-flex flex-wrap">
            <a href="<?php echo e(route('quiz.view')); ?>#depth-tests" class="btn btn-info mx-3 w-sm-auto w-100 my-2  rounded-pill font-weight-bold font-size-h5 font-hero px-14 hover-opacity-90 py-4 text-center">
                пройти углубленное
                <br>
                тестирование
            </a>

            <a href="<?php echo e(route('quiz.results', ['backTo' => route('dashboard')])); ?>" class="btn btn-warning mx-3 my-2 w-sm-auto w-100 rounded-pill font-size-h5 px-14 hover-opacity-90 py-4 text-center">
                результаты
                <br>
                первичный тест

            </a>

            <?php if($personal_quiz_available>0): ?>
                <br><br><br>
                <h3>Вы приглашены на КВИЗ!</h3>
                <a href="<?php echo e(route('orgunits.personal_quiz', $personal_quiz_available)); ?>" class="col-12 btn btn-warning px-8 py-5 font-weight-bold my-2 rounded-pill">Пройти КВИЗ</a>


            <?php endif; ?>


        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/student/_dashboard/depth-test-dashboard.blade.php ENDPATH**/ ?>