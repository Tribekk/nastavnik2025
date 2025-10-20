<livewire:components.select-city
    name="question_{{ $questions->firstItem() + $index }}" id="city"
    url="{{ route('kladr.cities', ['country' => 'rus']) }}"
    event="setCityQuestion"
    placeholder="{{__('Укажите город')}}"
    selected="{{ optional($question->answers[0]->user(Auth::id()))->value ?? null }}"
    selectedItemUrl="/kladr/cities"

/>

@push('scripts')
    <script>
        $(document).ready(function () {

            window.livewire.on('setCityQuestion', cityCode => {
                if(cityCode.toString() !== 'undefined') {
                    @this.call('answerTheQuestion', {{ $question->id }}, {{ $question->answers[0]->id }}, cityCode);
                }
            });
        });
    </script>
@endpush
