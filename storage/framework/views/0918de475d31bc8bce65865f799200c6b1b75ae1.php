<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: <?php echo e($availableQuiz->quiz->title); ?>

</h3>

<?php if(!isset($disablePreviousLink)): ?>
    <div>
        <a role="button" class="link font-size-h3" href="<?php echo e(route('quiz.view')); ?>">К списку анкет и тестов</a>
    </div>
<?php endif; ?>

<?php if($availableQuiz->quiz->id !== 8): ?>
    <?php
        $arithmetic_mean = 0;
        if (!empty($resultValues) && count($resultValues) > 0){
            $sum = 0;

            foreach($resultValues as $value) $sum += $value->percentage;
            $arithmetic_mean = $value = round($sum/count($resultValues));
            if ($value <= 34) {
    $color = '#FF0000'; // Красный цвет
} elseif ($value <= 70) {
    $color = '#FFD966'; // Желтый цвет
} elseif ($value <= 100) {
    $color = '#548235'; // Зеленый цвет
} else {
    $color = '#000000'; // Черный цвет (значение вне диапазона)
}

        }
if ($availableQuiz->quiz->id === 13) {
    $thinkingType = $userTypes[0];
    $userTypes = []; $userTypes[] = $thinkingType;
}
    ?>


<div class="row mt-12">
    <div class="col-md-12">
        <div class="row my-12">

            <?php $__empty_1 = true; $__currentLoopData = $userTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thinkingType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-12">
                    <div class="my-8">
                        
                        

                        
                        <?php if($thinkingType->manifestation->title): ?>
                            <h3 class="font-size-h3 font-weight-bold font-blue mb-0"><?php echo $thinkingType->manifestation->title; ?></h3>
                        <?php endif; ?>
                        <?php if($thinkingType->manifestation->description): ?>
                            <p class="font-size-h5"><?php echo $thinkingType->manifestation->description; ?></p>
                        <?php endif; ?>
                    </div>
                    <hr>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7 order-1 order-md-0">
                        <div class="progress mb-5 bg-transparent my-3"
                             style="position: relative; width: 100%; height: 18px;line-height: 18px">
                            <div class="progress-bar rounded-pill" role="progressbar"
                                 style="width: <?php echo e($arithmetic_mean); ?>%; z-index: 2; background-color: #FFFFFF;text-align: right"></div>
                            <div style="font-size: 18px;color:<?php echo e($color); ?>;font-weight: bold"><?php echo e($arithmetic_mean); ?></div>

                        </div>
                        <div class="progress mb-5 bg-transparent my-3"
                             style="position: relative; width: 100%; height: 18px">
                            <div class="progress-bar rounded-pill" role="progressbar"
                                 style="width: 34%; z-index: 2; background-color: #FF0000;border-radius: 0 !important;"></div>
                            <div class="progress-bar rounded-pill" role="progressbar"
                                 style="width: 36%; z-index: 2; background-color: #FFD966;border-radius: 0 !important;"></div>
                            <div class="progress-bar rounded-pill" role="progressbar"
                                 style="width: 30%; z-index: 2; background-color: #548235;border-radius: 0 !important;"></div>

                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar"
                                 style="width: 100%"></div>
                        </div>
                    </div>
                </div>

                <?php $__currentLoopData = $resultValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-md-7 order-1 order-md-0">
                            <div class="progress mb-5 bg-transparent my-3"
                                 style="position: relative; width: 100%; height: 18px">
                                <div class="progress-bar rounded-pill" role="progressbar"
                                     style="width: <?php echo e($value->percentage); ?>%; z-index: 2; background-color: <?php echo e($value->hexColor()); ?>"></div>
                                <div class="progress-bar bg-dark progress__bg-line" role="progressbar"
                                     style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <a href="<?php echo e(route('quiz.type-of-thinking-details', [$availableQuiz, $value->type_id])); ?>"
                               class="text-dark font-size-h4 <?php echo e($value->is_higher ? 'font-weight-bold' : ''); ?>"><?php echo e($value->type->title); ?></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php else: ?>
            <h4 class="font-size-h4 font-weight-bold text-dark-50 mb-0 mt-5">Результаты будут отображены после прохождения Вопросов</h4>
        <?php endif; ?>

    </div>





</div>



<?php $__env->startPush('css'); ?>
    <style>
        .progress__bg-line {
            width: 100%;
            height: 2px;
            top: 50%;
            left: 0;
            transform: translate(0, -50%);
            position: absolute;
            border-radius: 0;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        <?php
            $totalValues = 0;
            foreach ($resultValues as $value) {
                $totalValues += $value->value;
            }
        ?>

        <?php if($totalValues > 0): ?>
            var options = {
                series: [<?php $__currentLoopData = $resultValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo round((100 / $totalValues) * $value->value); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
                chart: {
                    height: 250,
                    type: 'donut',
                },
                dataLabels: {
                    enabled: false,
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '60%',
                            labels: {
                                show: false,
                            },
                        }
                    },

            },
            legend: false,
            colors: [<?php $__currentLoopData = $resultValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->value > 0): ?> "<?php echo $value->type->hex_color; ?>", <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
            labels: [<?php $__currentLoopData = $resultValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->value > 0): ?> "<?php echo $value->type->title; ?>", <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
        };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/_result-type-of-thinking.blade.php ENDPATH**/ ?>