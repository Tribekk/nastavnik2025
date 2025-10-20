@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <h1 class="font-pixel text-primary font-size-h1">Визитная карточка</h1>
                    <h4 class="font-size-h3">Пожалуйста, проверьте внесенные данные и если нужно, скорректируйте профиль</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @include('consultant.business-card._business-card.card')

                    <a href="{{ route('consultant.business_card.edit') }}" class="mt-8 btn btn-success">
                        <i class="la la-pencil"></i>
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
