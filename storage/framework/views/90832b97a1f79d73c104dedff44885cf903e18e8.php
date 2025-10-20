<?php

if (($availableQuiz->quiz->id === 8 || $availableQuiz->quiz->id === 13) && $answer->madeByUser(Auth::id()) ){
   $button = 'btn-info';
}elseif ($availableQuiz->quiz->id === 3  && $answer->madeByUser(Auth::id())){
  $button = 'btn-green';
}elseif ($answer->madeByUser(Auth::id())){
    $button = 'btn-success';
}

if (($availableQuiz->quiz->id === 8 || $availableQuiz->quiz->id === 13) && !$answer->madeByUser(Auth::id()) ){
   $button = 'btn-outline-info';
}elseif ($availableQuiz->quiz->id === 3  && !$answer->madeByUser(Auth::id())){
  $button = 'border-green';
}elseif (!$answer->madeByUser(Auth::id())){
    $button = 'btn-outline-success';
}

?>

<div wire:click="answerTheQuestion(<?php echo e($question->id); ?>, <?php echo e($answer->id); ?>)"
     class="rounded-pill py-4 px-md-10 w-100 text-md-left text-center m-3 cursor-pointer btn <?php echo e($button); ?> font-size-sm-h4 font-size-lg">
    <?php echo e($answer->title); ?>

</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/quiz/_run-quiz/_question-abv.blade.php ENDPATH**/ ?>