@foreach($values as $index => $value)
    <div class="w-100 border shadow-sm mb-10 font-size-h3 p-md-10">
        <div class="mb-5">
            <span class="{{ $value->question->required ? 'required' : '' }}">
                {{ ($index + 1) }}.
                {{ $value->question->content }}
            </span>

            @if($value->question->description)
                <p class="text-dark-50 small font-size-h4">{!! $value->question->description !!}</p>
            @endif
        </div>

        <div class="">
            <div class="form-group">
                @php
                    $questionValues = $wrapper->questionValues($value->question_id);
                    $questionValue = $questionValues[0];
                @endphp

                @if($questionValue->question->type->code == 'text')
                    @include("quiz.questionnaire.answers._question-text")
                @elseif($questionValue->question->type->code == 'select_city')
                    @include("quiz.questionnaire.answers._question-select_city")
                @elseif($questionValue->question->type->code == 'radio')
                    @include("quiz.questionnaire.answers._question-radio")
                @elseif($questionValue->question->type->code == 'radio')
                    @include("quiz.questionnaire.answers._question-radio")
                @elseif($questionValue->question->type->code == 'checkbox')
                    @include("quiz.questionnaire.answers._question-checkbox")
                @endif

                @php
                  $questionArbitraryAnswer = $wrapper->questionArbitraryAnswer($value->question_id);
                @endphp
                @if($questionArbitraryAnswer)
                    @include("quiz.questionnaire.answers._arbitrary-answer")
                @endif
            </div>
        </div>
    </div>
@endforeach
