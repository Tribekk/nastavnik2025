<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: <?php echo e($availableQuiz->quiz->title); ?>

</h3>

<?php if(!isset($disablePreviousLink)): ?>
    <div>
        <a role="button" class="link font-size-h3" href="<?php echo e(route('quiz.view')); ?>">К списку анкет и тестов</a>
    </div>
<?php endif; ?>

<h4 class="font-size-h3 font-alla font-hero mt-10 mb-5">
    Профессии: "<?php echo e($matrix->activityObject->title); ?>" + "<?php echo e($matrix->activityKind->title); ?>"
</h4>

<p class="font-size-h4">
    <?php echo e($matrix->description); ?>

</p>

<h4 class="font-size-h3 font-alla font-hero mt-10 mb-5">
    Примеры профессий:
</h4>

<p class="font-size-h4 mb-10">
    <?php echo $matrix->professions; ?>

</p>

<a href="<?php echo e(route('quiz.person-types', $availableQuiz)); ?>" class="btn btn-lg btn-primary font-hero-super">Посмотреть мой типаж и рекомендации</a>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_result-suitable-professions.blade.php ENDPATH**/ ?>