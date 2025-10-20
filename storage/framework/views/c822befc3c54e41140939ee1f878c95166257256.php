<?php if($questionnaireResult && $questionnaireResult->values): ?>
    <div class="card-body" id="anketa">
        <div class="container">
            <div class="row">
                <div class="col-md-3 my-3">

                    <button
                        class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill">
                        Анкета
                    </button>
                    <h3 class="font-weight-bold font-size-h3 text-info mt-6">Демографический портрет и мотивы
                        выбора</h3>
                    <p class="font-size-h6 text-dark text-break">Текущие общие сведения</p>
                </div>

                    <?php
                        $columnCount = 3;

                        $valuesCollection = collect($questionnaireResult->values);
                        $totalValues = $valuesCollection->count();
                        $firstColumnCount = 6;
                        $remainingCount = $totalValues - $firstColumnCount * 2;

                        $valuesChunks = [
                            $valuesCollection->take($firstColumnCount),
                            $valuesCollection->skip($firstColumnCount)->take($firstColumnCount),
                            $valuesCollection->skip($firstColumnCount * 2)->take($remainingCount),
                        ];
                        $previousContent = null;
                    ?>


                    <?php $__currentLoopData = $valuesChunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 my-3">
                            <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="font-size-h6 my-2 text-break">
                                    <?php if($value->question->content !== $previousContent): ?>
                                        <b style="color: #FFC82C"><?php echo e($value->question->content); ?></b><br>
                                    <?php endif; ?>
                                    <?php if($value->value): ?>
                                        <?php echo e($value->value); ?>

                                    <?php else: ?>
                                        <?php echo e($value->answer->title); ?>

                                    <?php endif; ?>
                                </div>
                                <?php
                                    $previousContent = $value->question->content;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div class="col-md-7 order-1 order-md-0">
                        <h2 class="font-weight-bold font-size-h1 text-info mt-6 mb-10">Общие данные</h2>
                        <div class="progress mb-5 bg-transparent my-3"
                             style="position: relative; width: 100%; height: 18px">
                            <div class="progress-bar rounded-pill" role="progressbar"
                                 style="width: <?php echo e($questionnaireResult->willingness_to_choose_profession_score); ?>%; z-index: 2; background-color: #8073e1"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar"
                                 style="width: <?php echo e(100 - $questionnaireResult->willingness_to_choose_profession_score); ?>%;height: 3px;margin: auto;left: <?php echo e($questionnaireResult->willingness_to_choose_profession_score); ?>%;"></div>
                        </div>
                    </div>
                    <div class="col-md-3 order-1 order-md-0 my-3 align-self-end my-3">
                    <span
                        style="font-size: 25px"><?php echo e($questionnaireResult->willingness_to_choose_profession_score); ?>%</span>
                    </div>

            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Анкета не пройдена
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/_results/questionnaire-compare.blade.php ENDPATH**/ ?>