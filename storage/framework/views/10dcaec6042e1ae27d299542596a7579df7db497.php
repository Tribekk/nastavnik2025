<div class="card-body d-flex flex-column bg-cover-image position-relative">
    <div class="d-flex mb-48 flex-wrap flex-grow-1 align-content-start">
        <div class="mr-5 flex-grow-1">
            <a href="/" class="d-inline-block">
                <img src="<?php echo e(asset('img/newLogo.png')); ?>" class="img-fluid w-120px">
            </a>
            <h3 class="font-pixel font-size-h6 mt-8">Отчет по итогам <span class="text-primary"><?php echo e($depthTestsFinished ? 'полного' : 'базового'); ?></span> тестирования</h3>
        </div>
        <div class="flex-grow-1 text-md-center mt-8">
            <div class="d-inline-block position-relative">
                <h2 class="font-size-h2 text-primary font-pixel">ПРОФТРЕКЕР</h2>
                <h2 class="font-pixel" style="color: #2d38fc;font-size: 1.1rem;align-self: center;padding: 0 5px;border-radius: 5px;">НАСТАВНИЧЕСТВО</h2>
                <a href="/" class="absLink"></a>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-end flex-wrap">
        
        <div class="mt-8">
            <h3 class="font-size-h2"><?php echo e($user->fullName); ?></h3>
            <h4 class="font-size-h2"><?php echo e($user->school->short_title ?? '-'); ?></h4>
            <h4 class="font-size-h2"><?php echo e($user->class->number); ?><?php echo e($user->class->letter); ?></h4>
        </div>
    </div>

    

    
</div>

<?php $__env->startPush('css'); ?>
    <style>
        .bg-cover-image {
            position: relative;
            overflow: hidden;
            height: 80vh;
        }

        .bg-cover-image > * {
            z-index: 2;
        }

        
        
        
        
        
        
        
        
        
        
        
        
        
        

        .img-girl {
            position: absolute;
            bottom: 18%;
            right: 3%;
            height: 18%;
            transform: scaleX(-1);
        }

        .img-boy {
            position: absolute;
            bottom: 3%;
            right: 12%;
            height: 18%;
            transform: scaleX(-1);
        }

        @media  only screen and (max-width: 670px) {
            .bg-cover-image:before {
                background-image: unset;
            }

            .img-boy, .img-girl {
                display: none;
            }

            .bg-cover-image {
                height: 100%;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/quiz/_results/home-screen.blade.php ENDPATH**/ ?>