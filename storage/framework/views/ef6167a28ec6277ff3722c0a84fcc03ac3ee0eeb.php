<?php
    $colMd = "col-md-";
    $answersCount = $question->answers()->count();
    if($answersCount > 2) {
        if($answersCount % 3 == 0) $colMd .= "4";
        else if($answersCount % 4 == 0) $colMd .= "3";
        else $colMd .= "4";
    } else $colMd .= "12";

    $inline = false;
    $inlineQuestions = [
        "Какова вероятность, что ты останешься строить карьеру (любую) в родном городе",
        "Какова вероятность, что Ваш ребенок останется строить карьеру (любую) в родном городе",
        "Оцените общий уровень благополучия Вашей семьи",
        "Ваш общий трудовой стаж?",
        "Какой секцией занимаешься самое продолжительное время - укажи сколько лет",
        "Какой у тебя средний балл?",
    ];

    if(in_array($question->content, $inlineQuestions)) {
        $inline = true;
    }

    if($answersCount <=2) {
        $inline = true;
    }


?>

<div class="<?php echo e($inline ? 'radio-inline' : 'row'); ?> flex-wrap">
    <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(!$inline): ?>
            <div class="<?php echo e($colMd); ?> my-2">
        <?php endif; ?>
            <label class="radio radio-blue font-size-sm-h4 font-size-lg <?php echo e($inline ? 'my-2' : ''); ?> d-flex align-items-start align-content-start">
                <input
                    type="radio"
                    name="question_<?php echo e($questions->firstItem() + $index); ?>"
                    wire:click="answerTheQuestion(<?php echo e($question->id); ?>, <?php echo e($answer->id); ?>)"
                    <?php if($answer->madeByUser(Auth::id())): ?> checked <?php endif; ?>
                >
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span><?php echo e($answer->title); ?>

            </label>
        <?php if(!$inline): ?>
            </div>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/_run-quiz/_question-radio.blade.php ENDPATH**/ ?>