<table><tr><td>

<label for="phys_prof_interest_green">Общие профессиональные характеристики</label>
        </td></tr></table>

            <br>

&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input type="number" min="0" max="100"
       name="baseTestItems[prof_characters][result][{{$type}}][start]"
       value="{{ @$control_values['prof_characters']['result'][$type]['start'] }}" size="5">
по

<input  type="number" min="0" max="100"
        name="baseTestItems[prof_characters][result][{{$type}}][end]"
        value="{{ @$control_values['prof_characters']['result'][$type]['end'] }}" size="5">

<br>
<br>

@foreach($ProfessionalTypeOfThinkingModelItems as $Professional)
    <table>
        <tr>
            <td>
                <input type="checkbox"
                       name="baseTestItems[prof_characters][{{$Professional->short_title}}][{{$type}}][check]" value="1"
                       id="himbio_green"

                       @if(@$control_values['prof_characters'][$Professional->short_title][$type]['check']==1)
                       checked selected
                    @endif

                >
            </td>
            <td>
                <label for="himbio_green">{{$Professional->title}}</label>
            </td>
        </tr>
    </table><br>
    &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
    <input type="number" min="0" max="100"
           name="baseTestItems[prof_characters][{{$Professional->short_title}}][{{$type}}][start]"
           value="{{ @$control_values['prof_characters'][$Professional->short_title][$type]['start'] }}" size="5">
    по

    <input type="number" min="0" max="100"
           name="baseTestItems[prof_characters][{{$Professional->short_title}}][{{$type}}][end]"
           value="{{ @$control_values['prof_characters'][$Professional->short_title][$type]['end'] }}" size="5">

    <br>
    <br>
@endforeach
