@if($item->type()->first()->code=="abv"
    or $item->type()->first()->code=="checkbox"
    or $item->type()->first()->code=="circle"
    )

    @foreach($item->answers()->get() as $answer)

        <input type="checkbox" id="checkbox_{{ $baseTestItems->first()->id }}_{{$answer->id}}" name="baseTestItems[{{$type}}][{{$answer->id}}]" value="1"

               @if(@$control_values[$type][$answer->id]==1)
               checked selected
                @endif

        >
        <label for="checkbox_{{ $baseTestItems->first()->id }}_{{$answer->id}}">{{ $answer->title }}</label><br>



    @endforeach

@endif

@if($item->type()->first()->code=="radio"
or $item->type()->first()->code=="yns"
or $item->type()->first()->code=="yn"
or $item->type()->first()->code=="select_text_answer"
)

    @foreach($item->answers()->get() as $answer)

        <input type="radio" id="radio_{{ $baseTestItems->first()->id }}_{{$answer->id}}" name="baseTestItems[{{$type}}][{{$answer->id}}]" value="1"

               @if(@$control_values[$type][$answer->id]==1)
               checked selected
                @endif>
        <label for="radio_{{ $baseTestItems->first()->id }}_{{$answer->id}}">{{ $answer->title }}</label><br>



    @endforeach

@endif