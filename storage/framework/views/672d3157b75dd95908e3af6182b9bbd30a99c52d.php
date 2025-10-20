<div class="screen home-screen">
    <div class="content" style="padding: 0; margin: 0;">
        <table>
            <tr>
                <td>
                    <h3 class="font-pixel font-size-h4">Отчет по итогам <span class="text-primary"><?php echo e($depthTestsFinished ? 'полного' : 'базового'); ?></span> профориентационного тестирования</h3>
                </td>
                <td style="width: 200px">
                    <h2 class="text-right font-size-h2 text-primary font-pixel" class="font-pixel text-uppercase text-center text-white">Профтрекер</h2>
                </td>
            </tr>
        </table>
        <table style="margin-top: 280px">
            <tr>
                <td style="width: 130px">
                    <?php echo $__env->make('quiz._results._pdf.img.bot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </td>
                <td>
                    <div class="mt-8 text-left">
                        <h3 class="font-size-h4"><?php echo e($user->fullName); ?></h3>
                        <h4 class="font-size-h4"><?php echo e($user->school->typeEducationOrganization->title); ?> <?php echo e($user->school->number); ?></h4>
                        <h4 class="font-size-h4"><?php echo e($user->class->number); ?><?php echo e($user->class->letter); ?> структурное подразделение</h4>
                    </div>
                </td>
            </tr>
        </table>

        <?php echo $__env->make('quiz._results._pdf.img.girl', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('quiz._results._pdf.img.boy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<style>
    .home-screen {
        position: relative;
        width: 100%;
        height: 96%;
    }

    .home-screen:before {
        position: absolute;
        content: '';
        bottom: 0;
        right: 0;
        width: 112%;
        height: 112%;
        background-image: url('<?php echo e(public_path('/img/bg_net.png')); ?>');
        background-repeat: no-repeat;
        background-size: cover;
        background-position-x: 0;
        background-position-y:  30px;
        transform: scaleX(-1);
    }

    .home-screen > * {
        z-index: 2;
    }

    .home-screen .img-girl {
        position: absolute;
        bottom: 25%;
        right: 15%;
        transform: scaleX(-1);
        height: 150px;
    }

    .home-screen .img-boy {
        position: absolute;
        bottom: 10%;
        right: 22%;
        height: 150px;
        transform: scaleX(-1);
    }
</style>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/_results/_pdf/home-screen.blade.php ENDPATH**/ ?>