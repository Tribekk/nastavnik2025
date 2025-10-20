<?php if((!isset($pages) || !$pages)): ?>
    <div class="container">
<?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <?php
                $sectionClasses = (isset($pages) && $pages) ?
                    "rounded-0 min-vh-100" :
                    "gutter-b";

                function backResultsUrl($sectionId, $userId = null) {
                    if(\Illuminate\Support\Facades\Route::is('quiz.user_results') && $userId) {
                        return route('quiz.user_results', $userId)."?backTo=".request('backTo', false)."#{$sectionId}";
                    }

                    return route('quiz.results')."#{$sectionId}";
                }
            ?>

            <div class="card card-custom w-100 <?php echo e($sectionClasses); ?>">
                <img class="bgImg img-cover" src="<?php echo e(asset('img/bootBg.png')); ?>" alt="">
                <?php echo $__env->make('quiz._results.home-screen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make('quiz._results.quizzes-screen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make('quiz._results.questionnaire-screen__about-me', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make('quiz._results.questionnaire-screen__motive-of-choice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make('quiz._results.questionnaire-screen__willingness-to-choice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make('quiz._results.test-screen__character_traits', ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make("quiz._results.test-screen-interests", ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make("quiz._results.test-screen-suitable_professions", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make("quiz._results.test-screen-person-types", ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make("quiz._results.result-screen", ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="page-break"></div>

            <?php if($depthTestsFinished): ?>
                <div class="card card-custom <?php echo e($sectionClasses); ?>">
                    <?php echo $__env->make("quiz._results.test-screen-inclinations", ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="page-break"></div>

                <div class="card card-custom <?php echo e($sectionClasses); ?>">
                    <?php echo $__env->make("quiz._results.test-screen-intelligence-level", ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="page-break"></div>

                <div class="card card-custom <?php echo e($sectionClasses); ?>">
                    <?php echo $__env->make("quiz._results.test-screen-type-of-thinking", ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="page-break"></div>

                <div class="card card-custom <?php echo e($sectionClasses); ?>">
                    <?php echo $__env->make("quiz._results.test-screen-solution-of-cases", ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="page-break"></div>

                <div class="card card-custom <?php echo e($sectionClasses); ?>">
                    <?php echo $__env->make("quiz._results.questionnaire-compare", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="page-break"></div>
            <?php elseif($user->hasDepthTests() && !(isset($pages) && $pages)): ?>
                <div class="card gutter-b">
                    <div class="card-body">
                        <div class="container">
                             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'light-info','text' => 'Для того чтобы просмотреть отчет по углубленному тестированию необходимо завершить углубленное тестирование.','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card card-custom <?php echo e($sectionClasses); ?>">
                <?php echo $__env->make("quiz._results.end-screen", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

<?php if((!isset($pages) || !$pages)): ?>
    </div>
<?php endif; ?>

<?php $__env->startPush('css'); ?>
    <style>
        .page-break {
            page-break-after: always;
        }

        <?php if(isset($pages) && $pages): ?>
            body {
                background: #fff!important;
            }

            a, a:hover {
                text-decoration: none!important;
            }
        <?php endif; ?>
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_results/content.blade.php ENDPATH**/ ?>