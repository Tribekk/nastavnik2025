@if($item->type()->first()->code=="abv" || $item->type()->first()->code=="select"
    or $item->type()->first()->code=="checkbox"

    )

    @foreach($item->answers()->get() as $answer)

        <input type="checkbox" id="checkbox_{{ $anketItems->first()->id }}_{{$answer->id}}" name="anketItems[{{$type}}][{{$answer->id}}]" value="1"

               @if(@$control_values[$type][$answer->id]==1)
                   checked selected
                @endif

        >
        <label for="checkbox_{{ $anketItems->first()->id }}_{{$answer->id}}">{{ $answer->title }}</label><br>



    @endforeach

@endif

    @if($item->type()->first()->code=="radio"
    or $item->type()->first()->code=="yns"
    or $item->type()->first()->code=="yn"
    )

        @foreach($item->answers()->get() as $answer)

            <input type="checkbox" id="radio_{{ $anketItems->first()->id }}_{{$answer->id}}" name="anketItems[{{$type}}][{{$answer->id}}]" value="1"

                   @if(@$control_values[$type][$answer->id]==1)
                   checked selected
                    @endif

            >
            <label for="radio_{{ $anketItems->first()->id }}_{{$answer->id}}">{{ $answer->title }}</label><br>



        @endforeach
    @else

@endif
