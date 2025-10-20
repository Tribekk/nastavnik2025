<div class="card-body d-flex flex-column position-relative">
    <div class="d-flex mb-5 flex-wrap flex-grow-1 align-content-start">
        <div class="mr-5 flex-grow-1">
            <img src="<?php echo e(asset('img/newLogo.png')); ?>" class="img-fluid w-120px">
        </div>
    </div>

    <div class="text-center py-8">
        <div>
            <img src="<?php echo e(asset('img/lgnew.png')); ?>">
        </div>




        <div class="d-flex justify-content-center mt-5 py-8 position-relative">
            <div class="mt-4">
                <h3 class="text-primary font-hero font-weight-bold font-size-h2">Обратная связь и вопросы:</h3>
                <a href="mailto:info@proftreker.ru" class="text-primary font-size-h3 font-weight-bold font-hero mb-7 d-block">info@proftreker.ru</a>

                <!--<a href="<?php echo e(route('dashboard')); ?>" class="text-primary font-size-h3 font-weight-bold font-hero"><?php echo e(request()->getHost()); ?></a>-->
            </div>

        </div>
    </div>
</div>

<?php $__env->startPush('css'); ?>
    <style>
        .img-bot {
            position: absolute;
            height: 100px;
            width: auto;
            left: calc(50% - 300px);
            top: 20%;
        }

        @media  only screen and (max-width: 720px) {
            .img-bot {
                top: -45%;
                left: 50%;
                transform: translateX(-50%);
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/quiz/_results/end-screen.blade.php ENDPATH**/ ?>