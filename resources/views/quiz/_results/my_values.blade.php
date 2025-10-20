<div class="row">
    <div class="col-md-7 my-4">
        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Я ценю в себе и людях</h3>
        @foreach($questionnaireResult->valuesMeAndPeople as $value)
            <div class="font-size-h6 my-2">
                <b>{{ $value['title'] }}</b>
                @if($value['description']) - {{ $value['description'] }}@endif
            </div>
        @endforeach
    </div>
    <div class="col-md-5 my-4">
        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Мой жизненный девиз и его интерпретация</h3>
        @foreach($questionnaireResult->lifeMottosAndInterpretations as $value)
            <div class="font-size-h6 my-2">
                <h4 class="font-weight-bold text-dark">{{ $value['title'] }}</h4>
                @if($value['description']){{ $value['description'] }}@endif
            </div>
        @endforeach
    </div>
</div>
