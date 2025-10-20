<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block">
            <h3 class="font-hero font-size-h5 pill pill__blue" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Анкетные данные</h3>
            <div style="margin-left: 10px">
                <h4 class="text-blue font-hero font-weight-bold m-0">ОБО МНЕ</h4>
                <span class="text-dark-50">Текущие общие сведения</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <div style="width: 220px; display: inline-block; vertical-align: top; word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Любимые предметы</h3>
                <?php $__currentLoopData = $questionnaireResult->favoriteSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="" style="word-wrap: break-word;">
                        <?php echo e($value); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="mt-4">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Средний балл в компании</h3>
                    <div class="" style="word-wrap: break-word;">
                        <?php echo e($questionnaireResult->avgMark); ?>

                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Мои увлечения</h3>
                    <?php $__currentLoopData = $questionnaireResult->hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="" style="word-wrap: break-word;">
                            <?php echo e($value); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Занимаюсь в секции <?php echo e($questionnaireResult->howLongHaveHobbies); ?></h3>
                    <div class="" style="word-wrap: break-word;"><?php echo e($questionnaireResult->whoseChoiceHobbies); ?></div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h3 mb-2">Дополнительные занятия с репетитором</h3>
                    <?php $__empty_1 = true; $__currentLoopData = $questionnaireResult->lessonsWithTutor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="" style="word-wrap: break-word;">
                            <?php echo e($value); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="">
                            Не занимаюсь с репетитором
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Опыт трудовой деятельности</h3>
                    <div class="" style="word-wrap: break-word;"><?php echo e($questionnaireResult->workExperience); ?></div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Ограничивающие особенности здоровья</h3>
                    <?php $__empty_1 = true; $__currentLoopData = $questionnaireResult->limitingHealthFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="" style="word-wrap: break-word;">
                            <?php echo e($value); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="">
                            Нет
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div style="width: 220px; display: inline-block; vertical-align: top; word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Мои личные качества</h3>
                <?php $__currentLoopData = $questionnaireResult->personalQualities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="" style="word-wrap: break-word;">
                        <?php echo e($value); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Коротко обо мне</h3>
                    <?php $__currentLoopData = $questionnaireResult->aboutMe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="" style="word-wrap: break-word;">
                            <?php echo e($value); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div style="width: 220px; display: inline-block; vertical-align: top; word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Миллион потрачу на</h3>
                <div class="" style="word-wrap: break-word;"><?php echo e($questionnaireResult->willSpendMillionOn); ?></div>

                <?php if($questionnaireResult->themeMyBlog): ?>
                    <div class="mt-5">
                        <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Свой блог в интернете посвящу теме</h3>
                        <div class="" style="word-wrap: break-word;">
                            <?php echo e($questionnaireResult->themeMyBlog); ?>

                        </div>
                    </div>
                <?php endif; ?>

                <?php if($questionnaireResult->whoDoWantToWork): ?>
                    <div class="mt-5">
                        <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Я хочу работать</h3>
                        <div class="" style="word-wrap: break-word;"><?php echo e($questionnaireResult->whoDoWantToWork); ?></div>
                    </div>
                <?php endif; ?>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Я точно не буду работать</h3>
                    <div class="" style="word-wrap: break-word;"><?php echo e($questionnaireResult->whoDontWantToWork); ?></div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Потому что</h3>
                    <div class="" style="word-wrap: break-word;"><?php echo e($questionnaireResult->whyWhoDontWantToWork); ?></div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Мой жизненный девиз и его интерпретация</h3>
                    <?php $__currentLoopData = $questionnaireResult->lifeMottosAndInterpretations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="" style="word-wrap: break-word;">
                            <h4 class="font-weight-bold text-dark"><?php echo e($value['title']); ?></h4>
                            <?php if($value['description']): ?><?php echo e($value['description']); ?><?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/_results/_pdf/questionnaire-screen__about-me.blade.php ENDPATH**/ ?>