@extends ('layout.page')

@section('subheader')
    <x-subheader title="Редактирование критериев"/>
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                        Редактирование критериев отбора (результаты углубленного теста) профиля "{{ $userProfile->title }}"
                    </div>
                </div>
                <div class="card-body">


                    <div style="width:100%" align="right">
                        <table><tr>

                                <td>
                                    <a href="{{ route('user_profiles.anket_results',$userProfile->id) }}">
                                        <div style="border-radius:5px;padding:5px;background-color:#fcfef6;">{{ __(' < Предыдущий блок') }}</div>
                                    </a>

                                </td><td width="5"></td>


                                <td>
                                    <a href="{{ route('user_profiles.edit',$userProfile->id) }}">
                                        <div style="border-radius:5px;padding:5px;background-color:#fcfef6;">{{ __(' На главную') }}</div>
                                    </a>

                                </td><td width="5"></td><td>


                                    <a href="{{ route('user_profiles.consult_results',$userProfile->id) }}">
                                        <div style="border-radius:5px;padding:5px;background-color:#fcfef6">{{ __(' Следующий блок >') }}</div>
                                    </a>

                                </td>
                            </tr></table>
                    </div>


                    @include('admin.user_profiles.include.result_messages')

                    <form action="{{ route('user_profiles.deep_test_results_update',$deepTestResults->first()->id) }}" method="POST" >

                        @csrf
                        <table>
                            <tr>
                                <td width="40"></td>
                                <td width="90%">

                                    <div class="row">


                                        <div class="col-xs-50 col-sm-50 col-md-50">
                                            <div class="form-group">


                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">№</th>

                                                        <th scope="col"></th>
                                                        <th scope="col">Зеленая зона</th>
                                                        <th scope="col">Желтая зона</th>
                                                        <th scope="col" >Красная зона</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>


                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            Склонности
                                                        </td>
                                                        <td style="background-color:#38957B">
                                                            @php
                                                                $type="green"
                                                            @endphp

                                                            @include('admin.user_profiles.include.deep_result_inclinations_form')

                                                        </td>
                                                        <td  style="background-color:#FFC35F">

                                                            @php
                                                                $type="yellow"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_inclinations_form')


                                                        </td>

                                                        <td  style="background-color:#FF4F06">

                                                            @php
                                                                $type="red"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_inclinations_form')


                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            Тип мышления
                                                        </td>
                                                        <td style="background-color:#38957B">
                                                            @php
                                                                $type="green"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_types_thinking')

                                                        </td>
                                                        <td  style="background-color:#FFC35F">

                                                            @php
                                                                $type="yellow"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_types_thinking')

                                                        </td>

                                                        <td  style="background-color:#FF4F06">

                                                            @php
                                                                $type="red"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_types_thinking')

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>
                                                            Уровень интеллекта <br>(значение)
                                                        </td>
                                                        <td style="background-color:#38957B">
                                                            @php
                                                                $type="green"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_intellegense_levels')

                                                        </td>
                                                        <td  style="background-color:#FFC35F">

                                                            @php
                                                                $type="yellow"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_intellegense_levels')


                                                        </td>

                                                        <td  style="background-color:#FF4F06">

                                                            @php
                                                                $type="red"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_intellegense_levels')


                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>
                                                            Уровень интеллекта <br>(уровни)
                                                        </td>
                                                        <td style="background-color:#38957B">
                                                            @php
                                                                $type="green"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_intellegense_levels_types')

                                                        </td>
                                                        <td  style="background-color:#FFC35F">

                                                            @php
                                                                $type="yellow"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_intellegense_levels_types')


                                                        </td>

                                                        <td  style="background-color:#FF4F06">

                                                            @php
                                                                $type="red"
                                                            @endphp
                                                            @include('admin.user_profiles.include.deep_result_intellegense_levels_types')


                                                        </td>
                                                    </tr>




                                                    </tbody>


                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        </table>
                        <div style="width:100%" align="right">
                            <table><tr>

                                    <td>
                                        <a href="{{ route('user_profiles.anket_results',$userProfile->id) }}">
                                            <div style="border-radius:5px;padding:5px;background-color:#fcfef6;">{{ __(' < Предыдущий блок') }}</div>
                                        </a>

                                    </td><td width="5"></td>


                                    <td>
                                        <a href="{{ route('user_profiles.edit',$userProfile->id) }}">
                                            <div style="border-radius:5px;padding:5px;background-color:#fcfef6;">{{ __(' На главную') }}</div>
                                        </a>

                                    </td><td width="5"></td><td>


                                        <a href="{{ route('user_profiles.consult_results',$userProfile->id) }}">
                                            <div style="border-radius:5px;padding:5px;background-color:#fcfef6">{{ __(' Следующий блок >') }}</div>
                                        </a>

                                    </td>
                                </tr></table>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">

                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <x-inputs.button-link type="btn-outline-success" link="{{ route('user_profiles.edit',$userProfile->id) }}" title="{{ __(' Назад') }}"/>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection