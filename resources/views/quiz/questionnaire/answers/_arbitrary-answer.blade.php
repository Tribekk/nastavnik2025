<div class="form-group mt-8">
    <label for="question_{{ $questionArbitraryAnswer->id }}">Другое</label>
    <input type="{{ $questionArbitraryAnswer->question->type }}"
           class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
           name="question_{{ $questionArbitraryAnswer->id }}"
           id="question_{{ $questionArbitraryAnswer->id }}"
           value="{{ $questionArbitraryAnswer->value }}"
           maxlength="191"
           readonly
           placeholder="Ответ">
</div>
