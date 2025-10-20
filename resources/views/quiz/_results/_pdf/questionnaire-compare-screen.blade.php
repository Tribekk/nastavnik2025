<style>
    .page-break {
        page-break-after: always;
    }
</style>

<div class="page-break"></div>
<div class="card-body page-break">
    <div class="container">
        <div class="row">
            <div class="col-md-3 my-3">
                <h2 class="font-hero font-size-h2"
                    style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Анкета</h2>
                <h4 class="font-weight-bold font-size-h4 text-info mt-6">Демографический портрет и мотивы выбора</h4>
                <p class="font-size-h6 text-dark text-break">Текущие общие сведения</p>
            </div>
            @if($questionnaireResult && $questionnaireResult->values)
                @php

                    $columnCount = 3;
                    $items = $questionnaireResult->values;
                    $itemsChunks = $items->chunk(ceil($items->count() / $columnCount));
                    $previousContent = null;
                @endphp

                <table>
                    <tr>
                        @foreach ($itemsChunks as $chunk)
                            <td>
                                @foreach ($chunk as $value)
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
                            </td>
                        @endforeach
                    </tr>
                </table>


                <div class="col-md-7 order-1 order-md-0">
                    <h2 class="font-weight-bold font-size-h2 text-info mt-6 mb-10">Общие данные</h2>
                    <div class="progress mb-5 bg-transparent my-3"
                         style="position: relative; width: 100%; height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: {{ $questionnaireResult->willingness_to_choose_profession_score }}%; z-index: 2; background-color: #8073e1"></div>
                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar"
                             style="width: {{ 100 - $questionnaireResult->willingness_to_choose_profession_score }}%;border-radius:0;height: 3px;margin: auto;left: {{ $questionnaireResult->willingness_to_choose_profession_score }}%;"></div>
                    </div>
                </div>
                <div class="col-md-3 order-1 order-md-0 my-3 align-self-end my-3">
                    <span
                        style="font-size: 25px">{{ $questionnaireResult->willingness_to_choose_profession_score }}%</span>
                </div>
            @endif
        </div>
    </div>
</div>
