@foreach($intellegens_levels as $intellegens_level)

    <table>
        <tr><td>{{ $intellegens_level->title }}</td><td width="5"></td>
            <td>

                <input type="checkbox" name="deepTestResults[intellegense_level][{{$intellegens_level->id}}][{{$type}}]" value="1"

                       @if(@$control_values['intellegense_level'][$intellegens_level->id][$type]==1)
                       checked selected
                        @endif

                >


            </td></tr>


    </table>
    <Br>


@endforeach