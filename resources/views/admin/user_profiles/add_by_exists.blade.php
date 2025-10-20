@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание нового профиля на основе существующего"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новый Профиль на основе существующего
                        </div>
                    </div>
                    <div class="card-body">

                        @include('admin.user_profiles.include.result_messages')


            <form action="{{ route('user_profiles.store_by_exists') }}" method="POST" >
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Использовать профиль:</strong>

                            <select name="profile_exists_id" style="width:250px;height:30px">

                                @foreach($user_profiles->get() as $user_profile)
                                    <option value="{{$user_profile->id}}">{{$user_profile->title}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Название профиля:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Название профиля" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>





                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <table>
                        <tr><td>
                    <button type="submit" class="btn btn-primary" style="background-color:#38957B">Создать новый профиль на основ указанного</button>
                            </td><td width="5"></td><td>
                    <a href="{{ route('user_profiles.index') }}">
                        <div style="border-radius:5px;padding:5px;background-color:#DBD6DB">{{ __(' Отмена') }}</div>
                    </a></td>
                        </tr>
                    </table>
                </div>


            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


