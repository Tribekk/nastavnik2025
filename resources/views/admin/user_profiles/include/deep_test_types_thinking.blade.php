@foreach($types_of_thinking as $type_of_thinking)

    <table>
        <tr><td>{{ $type_of_thinking->title }}</td><td width="5"></td>
            <td></td></tr>

        @foreach($type_of_thinking->manifestations()->get() as $type_think_manifest)
            <tr><td>

                    <table>
                        <tr><td>

                                <input type="checkbox" name="deepTestItems[type_of_thinking][{{$type_think_manifest->id}}][{{$type}}]" value="1"

                                       @if(@$control_values['type_of_thinking'][$type_think_manifest->id][$type]==1)
                                       checked selected
                                        @endif

                                >


                            </td><td>{{ $type_think_manifest->value_range }}</td></tr>
                    </table>

                </td><td width="5"></td>
                <td>{!!  $type_think_manifest->title  !!} </td></tr>
        @endforeach
    </table>
    <Br>


@endforeach