
<table class="w-100">
    <tr>
        <td>Общие личностные характеристики</td>
    </tr>

    <tr><td class="text-center">

            с <input type="number" min="0" max="100"
                   name="baseTestItems[personal_characters][result][{{$type}}][start]"
                   value="{{ @$control_values['personal_characters']['result'][$type]["start"] }}" size="5">
            по

            <input  type="number" min="0" max="100"
                    name="baseTestItems[personal_characters][result][{{$type}}][end]"
                    value="{{ @$control_values['personal_characters']['result'][$type]["end"] }}" size="5">



        </td></tr>

</table>
<br>

@foreach($PersonalTypeOfThinkingModelItems as $PersonalItem)
<table>
    <tr>
        <td>
            <input type="checkbox" name="baseTestItems[personal_characters][{{$PersonalItem->short_title}}][{{$type}}][check]" value="1"
                   id="phys_prof_interest_green"
                   @if(@$control_values['personal_characters'][$PersonalItem->short_title][$type]['check']==1)
                   checked selected
                @endif
            >
        </td>
        <td>
            <label for="phys_prof_interest_green">{{$PersonalItem->title}}</label>
        </td>
    </tr>
</table>
<br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input type="number" min="0" max="100"
       name="baseTestItems[personal_characters][{{$PersonalItem->short_title}}][{{$type}}][start]"
       value="{{ @$control_values['personal_characters'][$PersonalItem->short_title][$type]['start'] }}" size="5">
по
<input type="number" min="0" max="100"
       name="baseTestItems[personal_characters][{{$PersonalItem->short_title}}][{{$type}}][end]"
       value="{{ @$control_values['personal_characters'][$PersonalItem->short_title][$type]['end'] }}" size="5">
<br><br>
@endforeach
