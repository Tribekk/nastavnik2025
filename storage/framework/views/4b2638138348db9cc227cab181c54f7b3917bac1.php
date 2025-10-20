<div class="form-group mt-8">
    <label for="question_<?php echo e($questionArbitraryAnswer->id); ?>">Другое</label>
    <input type="<?php echo e($questionArbitraryAnswer->question->type); ?>"
           class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
           name="question_<?php echo e($questionArbitraryAnswer->id); ?>"
           id="question_<?php echo e($questionArbitraryAnswer->id); ?>"
           value="<?php echo e($questionArbitraryAnswer->value); ?>"
           maxlength="191"
           readonly
           placeholder="Ответ">
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/questionnaire/answers/_arbitrary-answer.blade.php ENDPATH**/ ?>