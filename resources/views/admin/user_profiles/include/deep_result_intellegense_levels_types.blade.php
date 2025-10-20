@foreach($intellegens_levels_types as $intellegens_levels_type)

    <table>
        <tr><td>{{ $intellegens_levels_type->title }}</td><td width="5"></td>
            <td>

                <input type="checkbox" name="deepTestResults[intellegens_levels_type][{{$intellegens_levels_type->id}}][{{$type}}]" value="1"

                       @if(@$control_values['intellegens_levels_type'][$intellegens_levels_type->id][$type]==1)
                       checked selected
                        @endif

                >


            </td></tr>


    </table>
    <Br>


@endforeach