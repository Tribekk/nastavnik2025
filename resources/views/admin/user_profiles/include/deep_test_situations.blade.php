@foreach($situations as $situation)

    <table>
        <tr><td><b>{{ $situation->title }}</b><Br><br>{{ $situation->content }}</td><td width="5"></td>
            <td></td></tr>

        @foreach($situation->situation_interpretations()->get() as $situation_interpretation)
            <tr><td>

                    <table>
                        <tr><td>

                                <input type="checkbox" name="deepTestItems[situation][{{$situation_interpretation->id}}][{{$type}}]" value="1"

                                       @if(@$control_values['situation'][$situation_interpretation->id][$type]==1)
                                       checked selected
                                        @endif

                                >


                            </td><td></td></tr>
                    </table>

                </td><td width="5"></td>
                <td>{!! $situation_interpretation->content  !!} </td></tr>
        @endforeach
    </table>
    <Br>


@endforeach