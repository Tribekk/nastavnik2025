<input type="checkbox" name="anketResults[tipag][phys][{{$type}}]" value="1" id="phys_tipag_green"

       @if(@$control_values['tipag']['phys'][$type]==1)
       checked selected
        @endif

>
<label for="phys_tipag_green">Физико-математический</label><br>


<input type="checkbox" name="anketResults[tipag][himbio][{{$type}}]" value="1" id="himbio_green"

       @if(@$control_values['tipag']['himbio'][$type]==1)
       checked selected
        @endif

>
<label for="himbio_green"> Химико-биологический</label><br>



<input type="checkbox" name="anketResults[tipag][digital][{{$type}}]" value="1" id="digital_green"

       @if(@$control_values['tipag']['digital'][$type]==1)
       checked selected
        @endif

>
<label for="digital_green">  Цифровой</label><br>

<input type="checkbox" name="anketResults[tipag][tehno][{{$type}}]" value="1" id="tehno_green"

       @if(@$control_values['tipag']['tehno'][$type]==1)
       checked selected
        @endif

>
<label for="tehno_green"> Технический</label><br>


<input type="checkbox" name="anketResults[tipag][geograph][{{$type}}]" value="1" id="geograph_green"

       @if(@$control_values['tipag']['geograph'][$type]==1)
       checked selected
        @endif

>
<label for="geograph_green"> Геолого-географический</label><br>


<input type="checkbox" name="anketResults[tipag][filolog][{{$type}}]" value="1" id="filolog_green"

       @if(@$control_values['tipag']['filolog'][$type]==1)
       checked selected
        @endif

>
<label for="filolog_green"> Филологический</label><br>


<input type="checkbox" name="anketResults[tipag][socpol][{{$type}}]" value="1" id="socpol_green"

       @if(@$control_values['tipag']['socpol'][$type]==1)
       checked selected
        @endif

>
<label for="socpol_green"> Социально-политический</label><br>


<input type="checkbox" name="anketResults[tipag][soceconom][{{$type}}]" value="1" id="gumanit_green"

       @if(@$control_values['tipag']['gumanit'][$type]==1)
       checked selected
        @endif

>
<label for="gumanit_green">Гуманитарный</label><br>




<input type="checkbox" name="anketResults[tipag][soceconom][{{$type}}]" value="1" id="soceconom_green"

       @if(@$control_values['tipag']['soceconom'][$type]==1)
       checked selected
        @endif

>
<label for="soceconom_green"> Социально-экономический</label><br>



<input type="checkbox" name="anketResults[tipag][hudestet][{{$type}}]" value="1" id="hudestet_green"

       @if(@$control_values['tipag']['hudestet'][$type]==1)
       checked selected
        @endif

>
<label for="hudestet_green"> Художественно-эстетический</label><br>



<input type="checkbox" name="anketResults[tipag][army_sport][{{$type}}]" value="1" id="army_sport_green"

       @if(@$control_values['tipag']['army_sport'][$type]==1)
       checked selected
        @endif

>
<label for="army_sport_green"> Оборонно-спортивный</label><br>
