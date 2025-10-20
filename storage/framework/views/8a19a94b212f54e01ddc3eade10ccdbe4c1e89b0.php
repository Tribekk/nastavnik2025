<style>
    .page-break {
        page-break-after: always;
    }
</style>

<div class="page-break"></div>
<div class="card-body page-break">
    <div class="container">
        <div class="row">
            <div class="col-md-3 my-3">
                <h2 class="font-hero font-size-h2"
                    style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Анкета</h2>
                <h4 class="font-weight-bold font-size-h4 text-info mt-6">Демографический портрет и мотивы выбора</h4>
                <p class="font-size-h6 text-dark text-break">Текущие общие сведения</p>
            </div>
            <?php if($questionnaireResult && $questionnaireResult->values): ?>
                <?php

                    $columnCount = 3;
                    $items = $questionnaireResult->values;
                    $itemsChunks = $items->chunk(ceil($items->count() / $columnCount));
                    $previousContent = null;
                ?>

                <table>
                    <tr>
                        <?php $__currentLoopData = $itemsChunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
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
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </table>


                <div class="col-md-7 order-1 order-md-0">
                    <h2 class="font-weight-bold font-size-h2 text-info mt-6 mb-10">Общие данные</h2>
                    <div class="progress mb-5 bg-transparent my-3"
                         style="position: relative; width: 100%; height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: <?php echo e($questionnaireResult->willingness_to_choose_profession_score); ?>%; z-index: 2; background-color: #8073e1"></div>
                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar"
                             style="width: <?php echo e(100 - $questionnaireResult->willingness_to_choose_profession_score); ?>%;border-radius:0;height: 3px;margin: auto;left: <?php echo e($questionnaireResult->willingness_to_choose_profession_score); ?>%;"></div>
                    </div>
                </div>
                <div class="col-md-3 order-1 order-md-0 my-3 align-self-end my-3">
                    <span
                        style="font-size: 25px"><?php echo e($questionnaireResult->willingness_to_choose_profession_score); ?>%</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/_results/_pdf/questionnaire-compare-screen.blade.php ENDPATH**/ ?>