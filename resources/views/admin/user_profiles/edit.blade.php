@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание нового профиля"/>
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                        Новый Профиль
                    </div>
                </div>
                <div class="card-body">


            @include('admin.user_profiles.include.result_messages')


                            <form action="{{ route('user_profiles.update',$userProfile->id) }}" method="POST" >
                                @method('PATCH')
                @csrf
                <table>
                    <tr>
                        <td width="40"></td>
                        <td width="80%">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Название профиля:</strong>
                                        <input type="text" name="title" class="form-control" placeholder="Название профиля" value="{{ old('title',$userProfile->title) }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td width="200">
                                                    @if($anket_items_completeted==false)
                                                         <a href="{{ route('user_profiles.ankets',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px">{{ __('Анкета') }}</button></a><br>
                                                    @else
                                                        <a href="{{ route('user_profiles.ankets',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white">{{ __('Анкета') }}</button></a><br>

                                                    @endif

                                                        @if($base_items_completeted==false)
                                                            <a href="{{ route('user_profiles.base_test_items',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:50px;margin-top:5px">{{ __('Вопросы и тесты по модели компетенций') }}</button></a><br>

                                                        @else
                                                            <a href="{{ route('user_profiles.base_test_items',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white">{{ __('Вопросы и тесты по модели компетенций') }}</button></a><br>

                                                        @endif


                                                        @if($deep_test_items_completeted==false)
                                                            <a href="{{ route('user_profiles.deep_test_items',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px" disabled="disabled">{{ __('Углубленные тесты') }}</button></a><br>

                                                        @else
                                                            <a href="{{ route('user_profiles.deep_test_items',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white" disabled="disabled">{{ __('Углубленные тесты') }}</button></a><br>

                                                        @endif



                                                        @if($anket_results_completeted==false)
                                                            <a href="{{ route('user_profiles.anket_results',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;">{{ __('Соответствие модели компетенций') }}</button></a><br>

                                                        @else
                                                            <a href="{{ route('user_profiles.anket_results',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white">{{ __('Соответствие модели компетенций') }}</button></a><br>

                                                        @endif


                                                        @if($deep_results_completeted==false)
                                                            <a href="{{ route('user_profiles.deep_test_results',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px" disabled="disabled">{{ __('Итоговое соответствие наставника') }}</button></a><br>

                                                        @else
                                                            <a href="{{ route('user_profiles.deep_test_results',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white" disabled="disabled">{{ __('Итоговое соответствие наставника') }}</button></a><br>

                                                        @endif


                                                        @if($consult_completeted==false)
                                                            <a href="{{ route('user_profiles.consult_results',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px" disabled="disabled">{{ __('Результаты после консультации ') }}</button></a><br>

                                                        @else
                                                            <a href="{{ route('user_profiles.consult_results',$userProfile->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white" disabled="disabled">{{ __('Результаты после консультации') }}</button></a><br>

                                                        @endif




                                                </td><td width="20"></td><td>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                </table>


                <div class="col-xs-12 col-sm-12 col-md-12 text-left">

                    <table><tr>
                            <td width="130"></td>
                            <td>
                    <button type="submit" class="btn btn-primary" style="background-color:#38957B">Сохранить</button>
                            </form>
                    </td><td width="5"></td>

                        <td>
                            <a href="{{ route('user_profiles.index') }}">
                                <div style="border-radius:5px;padding:5px;background-color:#DBD6DB">{{ __(' Отмена') }}</div>
                            </a>

                        </td>
                    <td width="5"></td>




                    <td>
                        <form method="GET" action="{{ route('user_profiles.create_by_exists')  }}">

                            @csrf

                            <button type="submit" style="border-radius:5px;padding:5px;background-color:#fcfef6">Дублировать Профиль</button>




                        </form>

                    </td>


                    <td width="5"></td>




                    <td>
                    <form method="POST" id="delete_profile_form" action="{{ route('user_profiles.destroy', $userProfile->id)  }}">
                        @method('DELETE')
                        @csrf

                        <button type="button" onClick="confirm_delete()" style="border-radius:5px;padding:5px;background-color:#fcfef6">Удалить Профиль</button>
                        <x-inputs.button-link type="btn-outline-success" link="{{ route('user_profiles.excel', $userProfile->id) }}" title="{{ __(' Экспорт в Excel') }}"/>




                    </form>

                    </td>
                    </tr>
                    </table>

                </div>

                <script>
                    function confirm_delete() {
                        if(confirm('Вы уверены что хотите удалить этот профиль?')) {
                            document.getElementById('delete_profile_form').submit();
                        }
                    }
                </script>


        </div>
    </div>
        </div>
    </div>

@endsection
