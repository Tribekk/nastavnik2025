<input type="{{ $questionValue->answer->type }}"
       class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
       name="question_{{ $questionValue->id }}"
       id="question_{{ $questionValue->id }}"
       value="{{ $questionValue->value }}"
       maxlength="191"
       readonly
       placeholder="{{__('Укажите город')}}">
