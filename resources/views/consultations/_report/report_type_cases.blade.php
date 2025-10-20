@php
    $solutionCasesResult = $consultation->child->solutionOfCasesResult;
    $situations = \Domain\Quiz\Models\Situation::all();
    $solutionCasesWrapper = new \App\Quiz\Wrappers\SolutionCasesResultWrapper();
@endphp

<div class="row">
    @foreach($situations as $situation)
        <div class="col-md-6 my-3">
            <h2 class="font-size-h2 font-blue">{{ $situation->title }}</h2>
            <h5 class="font-size-h5 font-weight-bold">{{ $situation->content }}</h5>

            @php
                $solutionCasesResults = $solutionCasesWrapper->results($situation->id, $solutionCasesResult->id);
            @endphp

            @foreach($solutionCasesResults as $value)
                <div class="mt-8">
                    @if($value->description)
                        <h4 class="font-weight-bold mb-3 font-size-h6">{{ $value->description }}</h4>
                    @endif

                    {!! $value->interpretation->content !!}
                </div>
            @endforeach
        </div>
    @endforeach
</div>
