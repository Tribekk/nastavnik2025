@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание нового профиля"/>
@endsection

@section('content')
    <div class="container">
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


            <form action="{{ route('user_profiles.store') }}" method="POST" >
                @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Название профиля:</strong>
                                        <input type="text" name="title" class="form-control" placeholder="Название профиля" value="{{ old('title') }}">
                                    </div>
                                </div>
                            </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <x-inputs.button-link type="btn-outline-success" link="{{ route('user_profiles.index') }}" title="{{ __(' Назад') }}"/>

                </div>


            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


