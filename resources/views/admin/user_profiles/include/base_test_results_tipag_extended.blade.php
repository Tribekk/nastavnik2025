<input type="checkbox" name="baseTestItems[tipag][phys][{{$type}}]" value="1" id="phys_tipag_green"

       @if(@$control_values['tipag']['phys'][$type]==1)
       checked selected
        @endif

>
<label for="phys_tipag_green">Физико-математический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
        <input type="number" min="0" max="100"
               name="baseTestItems[tipag][phys][start][{{$type}}]"
                value="{{ @$control_values['tipag']['phys'][start][$type] }}" size="5">
       по

        <input  type="number" min="0" max="100"
                name="baseTestItems[tipag][phys][end][{{$type}}]"
                value="{{ @$control_values['tipag']['phys'][end][$type] }}" size="5">

<br>


<input type="checkbox" name="baseTestItems[tipag][himbio][{{$type}}]" value="1" id="himbio_green"

       @if(@$control_values['tipag']['himbio'][$type]==1)
       checked selected
        @endif

>
<label for="himbio_green"> Химико-биологический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][himbio][start][{{$type}}]"
       value="{{ @$control_values['tipag']['himbio'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][himbio][end][{{$type}}]"
       value="{{ @$control_values['tipag']['himbio'][end][$type] }}" size="5">

<br>



<input type="checkbox" name="baseTestItems[tipag][digital][{{$type}}]" value="1" id="digital_green"

       @if(@$control_values['tipag']['digital'][$type]==1)
       checked selected
        @endif

>
<label for="digital_green">  Цифровой</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][digital][start][{{$type}}]"
       value="{{ @$control_values['tipag']['digital'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][digital][end][{{$type}}]"
       value="{{ @$control_values['tipag']['digital'][end][$type] }}" size="5">

<br>





<input type="checkbox" name="baseTestItems[tipag][tehno][{{$type}}]" value="1" id="tehno_green"

       @if(@$control_values['tipag']['tehno'][$type]==1)
       checked selected
        @endif

>
<label for="tehno_green"> Технический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][tehno][start][{{$type}}]"
       value="{{ @$control_values['tipag']['tehno'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][tehno][end][{{$type}}]"
       value="{{ @$control_values['tipag']['tehno'][end][$type] }}" size="5">

<br>





<input type="checkbox" name="baseTestItems[tipag][geograph][{{$type}}]" value="1" id="geograph_green"

       @if(@$control_values['tipag']['geograph'][$type]==1)
       checked selected
        @endif

>
<label for="geograph_green"> Геолого-географический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][geograph][start][{{$type}}]"
       value="{{ @$control_values['tipag']['geograph'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][geograph][end][{{$type}}]"
       value="{{ @$control_values['tipag']['geograph'][end][$type] }}" size="5">

<br>





<input type="checkbox" name="baseTestItems[tipag][filolog][{{$type}}]" value="1" id="filolog_green"

       @if(@$control_values['tipag']['filolog'][$type]==1)
       checked selected
        @endif

>
<label for="filolog_green"> Филологический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][filolog][start][{{$type}}]"
       value="{{ @$control_values['tipag']['filolog'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][filolog][end][{{$type}}]"
       value="{{ @$control_values['tipag']['filolog'][end][$type] }}" size="5">

<br>





<input type="checkbox" name="baseTestItems[tipag][socpol][{{$type}}]" value="1" id="socpol_green"

       @if(@$control_values['tipag']['socpol'][$type]==1)
       checked selected
        @endif

>
<label for="socpol_green"> Социально-политический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][socpol][start][{{$type}}]"
       value="{{ @$control_values['tipag']['socpol'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][socpol][end][{{$type}}]"
       value="{{ @$control_values['tipag']['socpol'][end][$type] }}" size="5">

<br>





<input type="checkbox" name="baseTestItems[tipag][gumanit][{{$type}}]" value="1" id="gumanit_green"

       @if(@$control_values['tipag']['gumanit'][$type]==1)
       checked selected
        @endif

>
<label for="gumanit_green">Гуманитарный</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][gumanit][start][{{$type}}]"
       value="{{ @$control_values['tipag']['gumanit'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][gumanit][end][{{$type}}]"
       value="{{ @$control_values['tipag']['gumanit'][end][$type] }}" size="5">

<br>






<input type="checkbox" name="baseTestItems[tipag][soceconom][{{$type}}]" value="1" id="soceconom_green"

       @if(@$control_values['tipag']['soceconom'][$type]==1)
       checked selected
        @endif

>
<label for="soceconom_green"> Социально-экономический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][soceconom][start][{{$type}}]"
       value="{{ @$control_values['tipag']['soceconom'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][soceconom][end][{{$type}}]"
       value="{{ @$control_values['tipag']['soceconom'][end][$type] }}" size="5">

<br>






<input type="checkbox" name="baseTestItems[tipag][hudestet][{{$type}}]" value="1" id="hudestet_green"

       @if(@$control_values['tipag']['hudestet'][$type]==1)
       checked selected
        @endif

>
<label for="hudestet_green"> Художественно-эстетический</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][hudestet][start][{{$type}}]"
       value="{{ @$control_values['tipag']['hudestet'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][hudestet][end][{{$type}}]"
       value="{{ @$control_values['tipag']['hudestet'][end][$type] }}" size="5">

<br>







<input type="checkbox" name="baseTestItems[tipag][army_sport][{{$type}}]" value="1" id="army_sport_green"

       @if(@$control_values['tipag']['army_sport'][$type]==1)
       checked selected
        @endif

>
<label for="army_sport_green"> Оборонно-спортивный</label><br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][army_sport][start][{{$type}}]"
       value="{{ @$control_values['tipag']['army_sport'][start][$type] }}" size="5">
по

<input  type="number" min="0" max="100"
       name="baseTestItems[tipag][army_sport][end][{{$type}}]"
       value="{{ @$control_values['tipag']['army_sport'][end][$type] }}" size="5">

<br>
