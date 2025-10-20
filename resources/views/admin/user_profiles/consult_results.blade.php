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
                        Редактирование критериев отбора (результаты консульации) профиля "{{ $userProfile->title }}"
                    </div>
                </div>
                <div class="card-body">

                    <div style="width:100%" align="right">
                        <table><tr>

                                <td>
                                    <a href="{{ route('user_profiles.deep_test_results',$userProfile->id) }}">
                                        <div style="border-radius:5px;padding:5px;background-color:#DBD6DB;">{{ __(' < Предыдущий блок') }}</div>
                                    </a>

                                </td><td width="5"></td>


                                <td>
                                    <a href="{{ route('user_profiles.edit',$userProfile->id) }}">
                                        <div style="border-radius:5px;padding:5px;background-color:#DBD6DB;">{{ __(' На главную') }}</div>
                                    </a>

                                </td>
                            </tr></table>
                    </div>

                    @include('admin.user_profiles.include.result_messages')

                    <form action="{{ route('user_profiles.consult_results_update',$consultResults->first()->id) }}" method="POST" >

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
                                                            Результаты карьерной консультации, <br>мнение профориентолога
                                                        </td>
                                                        <td style="background-color:#38957B">

                                                            <select  name="consultResults[consult][green]">
                                                                <option value="1"
                                                                    @if(@$control_values['consult']['green']==1)
                                                                        selected
                                                                        @endif
                                                                >согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['consult']['green']==0)
                                                                        selected
                                                                        @endif
                                                                >не согласен</option>
                                                            </select>

                                                        </td>
                                                        <td  style="background-color:#FFC35F">

                                                            <select  name="consultResults[consult][yellow]">
                                                                <option value="1"
                                                                        @if(@$control_values['consult']['yellow']==1)
                                                                        selected
                                                                        @endif
                                                                >согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['consult']['yellow']==0)
                                                                        selected
                                                                        @endif
                                                                >не согласен</option>
                                                            </select>

                                                        </td>

                                                        <td  style="background-color:#FF4F06">


                                                            <select  name="consultResults[consult][red]">
                                                                <option value="1"
                                                                        @if(@$control_values['consult']['red']==1)
                                                                        selected
                                                                        @endif
                                                                >согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['consult']['red']==0)
                                                                        selected
                                                                        @endif
                                                                >не согласен</option>
                                                            </select>
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            Результаты карьерной консультации, <br>мнение семьи
                                                        </td>
                                                        <td style="background-color:#38957B">

                                                            <select  name="consultResults[family][green]">
                                                                <option value="1"
                                                                        @if(@$control_values['family']['green']==1)
                                                                        selected
                                                                        @endif
                                                                >согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['family']['green']==0)
                                                                        selected
                                                                        @endif
                                                                >не согласен</option>

                                                                <option value="0"
                                                                        @if(@$control_values['family']['green']==2)
                                                                        selected
                                                                        @endif
                                                                >думают</option>
                                                            </select>

                                                        </td>
                                                        <td  style="background-color:#FFC35F">

                                                            <select  name="consultResults[family][yellow]">
                                                                <option value="1"
                                                                        @if(@$control_values['family']['yellow']==1)
                                                                        selected
                                                                        @endif
                                                                >согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['family']['yellow']==0)
                                                                        selected
                                                                        @endif
                                                                >не согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['family']['yellow']==2)
                                                                        selected
                                                                        @endif
                                                                >думают</option>
                                                            </select>

                                                        </td>

                                                        <td  style="background-color:#FF4F06">


                                                            <select  name="consultResults[family][red]">
                                                                <option value="1"
                                                                        @if(@$control_values['family']['red']==1)
                                                                        selected
                                                                        @endif
                                                                >согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['family']['red']==0)
                                                                        selected
                                                                        @endif
                                                                >не согласен</option>
                                                                <option value="0"
                                                                        @if(@$control_values['family']['red']==2)
                                                                        selected
                                                                        @endif
                                                                >думают</option>
                                                            </select>
                                                        </td>
                                                    </tr>


                                                    </tbody>


                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        </table>


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