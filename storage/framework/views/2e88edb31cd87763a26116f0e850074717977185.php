<?php $__env->startSection('content'); ?>
















<?php echo $__env->make('quiz._results._pdf.test-screen__type-of-thinking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('quiz._results._pdf.questionnaire-compare-screen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- УГЛУБЛЕННОЕ ТЕСТИРОВАНИЕ -->
    <?php if($depthTestsFinished): ?>
        <?php echo $__env->make('quiz._results._pdf.test-screen__inclinations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('quiz._results._pdf.test-screen__intelligence-level', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('quiz._results._pdf.test-screen__solution-of-cases', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php endif; ?>

    <!-- the end. -->
    <?php echo $__env->make('quiz._results._pdf.end-screen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/quiz/results-pdf.blade.php ENDPATH**/ ?>