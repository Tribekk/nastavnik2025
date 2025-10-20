@extends('layout.page')

@section('subheader')
    <x-subheader title="Результаты, твой профиль"/>
@endsection

@section('content')
    <div class="container">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="mb-10">
                        <a role="button" class="link font-size-h3" href="{{ route('quiz.view') }}">К списку анкет и вопросов</a>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-3">

                            <button
                                class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill">
                                Анкета
                            </button>
                            <h3 class="font-weight-bold font-size-h3 text-info mt-6">Демографический портрет и мотивы выбора</h3>
                            <p class="font-size-h6 text-dark text-break">Текущие общие сведения</p>
                        </div>

                        @php
                            $columnCount = 3;

                            $valuesCollection = collect($result->values);
                            $totalValues = $valuesCollection->count();
                            $firstColumnCount = 6;
                            $remainingCount = $totalValues - $firstColumnCount * 2;

                            $valuesChunks = [
                                $valuesCollection->take($firstColumnCount),
                                $valuesCollection->skip($firstColumnCount)->take($firstColumnCount),
                                $valuesCollection->skip($firstColumnCount * 2)->take($remainingCount),
                            ];
                            $previousContent = null;
                        @endphp


                            @foreach ($valuesChunks as $chunk)
                                <div class="col-md-3 my-3">
                                    @foreach($chunk as $value)
                                        <div class="font-size-h6 my-2 text-break">
                                            @if($value->question->content !== $previousContent)
                                                <b style="color: #FFC82C">{{ $value->question->content }}</b><br>
                                            @endif
                                            @if($value->value)
                                                {{ $value->value }}
                                            @else
                                                {{ $value->answer->title }}
                                            @endif
                                        </div>
                                        @php
                                            $previousContent = $value->question->content;
                                        @endphp
                                    @endforeach
                                </div>
                            @endforeach


                        <div class="col-md-7 order-1 order-md-0">
                            <h2 class="font-weight-bold font-size-h1 text-info mt-6 mb-10">Общие данные</h2>
                            <div class="progress mb-5 bg-transparent my-3"
                                 style="position: relative; width: 100%; height: 18px">
                                <div class="progress-bar rounded-pill" role="progressbar"
                                     style="width: {{ $result->willingness_to_choose_profession_score }}%; z-index: 2; background-color: #8073e1"></div>
                                <div class="progress-bar bg-dark progress__bg-line" role="progressbar"
                                     style="width: {{ 100 - $result->willingness_to_choose_profession_score }}%;height: 3px;margin: auto"></div>
                            </div>
                        </div>
                        <div class="col-md-3 order-1 order-md-0 my-3 align-self-end my-3">
                            <span style="font-size: 25px">{{ $result->willingness_to_choose_profession_score }}%</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
