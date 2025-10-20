<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__orange" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Итог</h3>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <h3 class="font-size-h4 font-weight-bold text-orange" style="margin-bottom: 20px;">Ориентируйтесь на эти сферы интересов</h3>

            @foreach($professionalTypes as $type)
                @php $value = $professionalTypeResult->values->where('type_id', $type->id)->first() @endphp
                <div style="display: block; margin: 0 0 20px 0; float: left; width: 700px; height: 25px">
                    <div style="width: 400px; margin-right: 12px; display: inline-block; vertical-align: top">
                        <div class="progress" style="border-radius: 8px;">
                            <div class="progress-bar bg-{{ $value->color }}" role="progressbar" style="width: {{ $value->percentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    <div class="font-size-h6 font-hero text-dark-50" style="width: 280px; display: inline-block; text-align: right;">
                        {{ $type->area }}
                    </div>
                </div>
                <div class="clearfix"></div>
            @endforeach
        </div>
    </div>
</div>

<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__orange" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Итог</h3>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <div style="width: 700px; vertical-align: top;">
                <h3 class="font-size-h4 font-weight-bold text-orange" style="margin-bottom: 20px;">Доминирующие черты</h3>

                <table>
                    <tr>
                        <td></td>
                        <td>
                            <div style="margin-bottom: 25px;">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="text-alla font-weight-bold font-size-h4">100%</div>
                                        </td>
                                        <td>
                                            <div class="text-dark-50 font-weight-bold font-size-h4 text-center">50%</div>
                                        </td>
                                        <td>
                                            <div class="text-orange font-weight-bold font-size-h4 text-right">100%</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="clearfix"></div>

                @foreach($characterTraitResultValues as $value)
                    <div style="margin-bottom: 25px;">
                        <h4 class="font-size-h5" style="width: 50%; display: inline-block;">
                        <span class="{{ $value->is_higher ? 'text-dark-50 font-weight-normal' : 'text-alla' }}">
                            {{ $value->trait->lower_value }}
                        </span>
                        </h4>
                        <h4 class="font-size-h5" style="width: 49%; display: inline-block; text-align: right;">
                        <span class="{{ $value->is_higher ? 'text-orange' : 'text-dark-50 font-weight-normal' }}">
                            {{ $value->trait->higher_value }}
                        </span>
                        </h4>

                        <div class="progress" style="border-radius: 8px; margin-top: 8px;">
                            @if($value->is_higher)
                                <div class="progress-bar {{ $characterTraitWrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="border-radius: 0; left: 50%; width: {{ $value->chart_percentage }}%"></div>
                            @else
                                <div class="progress-bar {{ $characterTraitWrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="border-radius: 0; left: {{ 50 - $value->chart_percentage }}%; width: {{ $value->chart_percentage }}%"></div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="width: 700px; vertical-align: top; margin-top: 50px;">
                <h3 class="font-size-h4 font-weight-bold text-orange" style="margin-bottom: 12px;">Достоверность результатов интересы + черты характера</h3>
                <span class="font-hero text-blue font-weight-bold">Полученные результаты достоверны на</span> <span class="font-size-h3 font-weight-bold font-hero text-alla">{{ $resultWrapper->bothReliabilityPercentage() }}%</span>
                <div class="font-size-h6" style="margin-top: 5px;">
                    {{ $resultWrapper->bothReliabilityDescription() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__orange" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Итог</h3>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <div style="width: 700px; vertical-align: top; margin-bottom: 30px;">
                <h3 class="font-size-h4 font-weight-bold text-blue" style="margin-bottom: 12px;">Выбраны профессии</h3>
                <div class="font-size-h5">"{{ $suitableProfessionMatrix->activityObject->title }}" + "{{ $suitableProfessionMatrix->activityKind->title }}"</div>
            </div>
            <div style="width: 700px; vertical-align: top; margin-bottom: 30px;">
                <h3 class="font-size-h4 font-weight-bold text-blue" style="margin-bottom: 12px;">Мотивы выбора</h3>

                <div style="width: 700px">
                    @foreach($resultFactorMotiveOfChoice as $factor)
                        <div style="width: 700px">
                            <div style="width: 380px; margin-right: 20px; display: inline-block; vertical-align: top;">
                                <div class="progress bg-transparent">
                                    <div class="progress-bar {{ $factor->percentage >= 50 ? $progressColor ?? 'bg-blue' : 'bg-gray' }}" role="progressbar" style="width: {{ $factor->percentage }}%;"></div>
                                    <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%;"></div>
                                </div>
                            </div>
                            <div style="width: 300px; display: inline-block; vertical-align: top;">
                                <h4 class="font-size-h5">
                                    <span class="{{ $factor->percentage >= 50 ? $textColor ?? 'text-blue' : 'text-dark-50' }}">
                                        {{ $factor->factor->title }}
                                    </span>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="width: 700px; vertical-align: top;">
                <h3 class="font-size-h4 font-weight-bold text-blue" style="margin-bottom: 12px;">На текущий момент проявлена</h3>
                <div class="font-size-h5">{{ $questionnaireResult->willingness_to_choose_profession_label }}</div>
            </div>
        </div>
    </div>
</div>
