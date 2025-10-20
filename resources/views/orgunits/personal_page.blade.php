@extends('layout.auth')

@section('content')
    <div>

            <div class="pb-lg-0 pb-2" style="margin-top:-200px">
                <table>

                    <tr><td align="center">

                            <h3>{{ $orgunit->title }}</h3>

                        </td></tr>

                    <tr><td>

                            <a href="{{ route('orgunits.personal_quiz', $orgunit) }}" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                {{ __('Пройти тестирование') }}
                            </a>

                            <a href="{{  route('orgunits.personal_quiz', $orgunit) }}" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                {{ __('Пройти КВИЗ') }}
                            </a>

                        </td></tr>

                </table>


            </div>


    </div>
@endsection
