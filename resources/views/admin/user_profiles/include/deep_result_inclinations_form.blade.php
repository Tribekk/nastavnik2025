@foreach($inclinations as $inclination)

    <table>
        <tr><td>{{ $inclination->title }}</td><td width="5"></td>
        <td></td></tr>

        @foreach($inclination->types()->get() as $inclination_type)
        <tr><td>

            <table>
                <tr><td>

                        <input type="checkbox" name="deepTestResults[inclinations][{{$inclination_type->id}}][{{$type}}]" value="1"

                               @if(@$control_values['inclinations'][$inclination_type->id][$type]==1)
                               checked selected
                                @endif

                        >


                    </td><td>{{ $inclination_type->value_range }}</td></tr>
            </table>

            </td><td width="5"></td>
            <td>{{ $inclination_type->title }}</td></tr>
        @endforeach
    </table>
    <Br>


@endforeach