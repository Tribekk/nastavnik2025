<div class="card-body" id="type-of-thinking">
    <div class="d-flex flex-sm-nowrap flex-wrap">

        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">





            

            <div class="row">
                <h4 class="col-md-12 order-1 order-md-0 mt-5">
                    Итоговое соответствие модели компетенций Наставника:
                </h4>

                <?php if($typeThinkingValuesEndAverage !== 0.0): ?>
                <div class="row">
                    <div class="col-md-12 order-1 order-md-0">
                        <?php echo $typeThinkingValuesEndAverageDesc; ?>

                    </div>
                </div>
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: <?php echo e($typeThinkingValuesEndAverage); ?>%; z-index: 2; background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:<?php echo e($typeThinkingValuesEndAverageColor); ?>;font-weight: bold"><?php echo e($typeThinkingValuesEndAverage); ?></div>

                    </div>
                    <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 34%; z-index: 2; background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 36%; z-index: 2; background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 30%; z-index: 2; background-color: #548235;border-radius: 0 !important;"></div>

                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="row mx-auto">
                        <div class="col-md-12 order-1 order-md-0 text-center">
                            Результатов еще нет
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            


            
            <hr>
            <div class="row">
                <h4 class="col-md-12 order-1 order-md-0 mt-5">
                    Общее соответствие модели личностных характеристик
                    наставника:
                </h4>

                <?php if($PersonalThinkingTypesAverage !== 0): ?>
                <div class="row">
                    <div class="col-md-12 order-1 order-md-0">
                        <?php echo $PersonalThinkingTypesAverageDesc; ?>

                    </div>
                </div>
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: <?php echo e($PersonalThinkingTypesAverage); ?>%; z-index: 2; background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:<?php echo e($PersonalThinkingTypesAverageColor); ?>;font-weight: bold"><?php echo e($PersonalThinkingTypesAverage); ?></div>

                    </div>
                    <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 34%; z-index: 2; background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 36%; z-index: 2; background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 30%; z-index: 2; background-color: #548235;border-radius: 0 !important;"></div>

                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="row mx-auto">
                        <div class="col-md-12 order-1 order-md-0 text-center">
                            Результатов еще нет
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($PersonalThinkingTypes): ?>
            <?php $__currentLoopData = $PersonalThinkingTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-5 order-1 order-md-0">
                        <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo e($value->percentage); ?>%; z-index: 2; background-color: <?php echo e($value->hexColor()); ?>"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <span class="text-dark font-size-h5 <?php echo e($value->percentage > 70 ? 'font-weight-bold' : ''); ?>"><?php echo e($value->type->title); ?></span>
                    </div>

                    <div class="col-md-12"></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            

            
            <hr>
            <div class="row">
                <h4 class="col-md-12 order-1 order-md-0 mt-5">
                    Общее соответствие модели профессиональных характеристик наставника:
                </h4>

                <?php if($ProfessionalThinkingTypesAverage !== 0): ?>
                <div class="row">
                    <div class="col-md-12 order-1 order-md-0">
                        <?php echo $ProfessionalThinkingTypesAverageDesc; ?>

                    </div>
                </div>
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: <?php echo e($ProfessionalThinkingTypesAverage); ?>%; z-index: 2; background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:<?php echo e($ProfessionalThinkingTypesAverageColor); ?>;font-weight: bold"><?php echo e($ProfessionalThinkingTypesAverage); ?></div>

                    </div>
                    <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 34%; z-index: 2; background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 36%; z-index: 2; background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: 30%; z-index: 2; background-color: #548235;border-radius: 0 !important;"></div>

                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="row mx-auto">
                        <div class="col-md-12 order-1 order-md-0 text-center">
                            Результатов еще нет
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            

            <?php if($ProfessionalThinkingTypes): ?>
            <?php $__currentLoopData = $ProfessionalThinkingTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                //dd($value);
                ?>
                <div class="row">
                    <div class="col-md-5 order-1 order-md-0">
                        <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo e($value->percentage); ?>%; z-index: 2; background-color: <?php echo e($value->hexColor()); ?>"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <span class="text-dark font-size-h5 <?php echo e($value->percentage > 70 ? 'font-weight-bold' : ''); ?>"><?php echo e($value->type->title); ?></span>
                    </div>
                    <div class="order-1 order-md-0 col-md-12 mb-10">
                        <?php if($value->manifestation): ?><?php echo e($value->manifestation->description); ?><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>























        </div>
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
    <?php if($typeThinkingValues): ?>
        <?php
            $totalValues = 0;
            foreach ($typeThinkingValues as $value) {
                $totalValues += $value->value;
            }
        ?>

        <?php if($totalValues > 0): ?>
        var options = {
            series: [<?php $__currentLoopData = $typeThinkingValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo round((100 / $totalValues) * $value->value); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
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
            colors: [<?php $__currentLoopData = $typeThinkingValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->value > 0): ?> "<?php echo $value->type->hex_color; ?>", <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
            labels: [<?php $__currentLoopData = $typeThinkingValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->value > 0): ?> "<?php echo $value->type->title; ?>", <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
        <?php endif; ?>
    <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/quiz/_results/test-screen-type-of-thinking.blade.php ENDPATH**/ ?>