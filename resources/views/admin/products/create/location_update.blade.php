

@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание новых проектов"/>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">

 <x-card>
            <x-slot name="title">@if (($products->org) == 0)
                Редактировать проект № {{ $products->id }}
                @else
                Редактировать проект № {{ $products->id }} для {{ $ExternalOrgunit->first()->where('id', $products->org)->value('short_title') }}
                @endif
            </x-slot>

            <x-tables.status/>
        </x-card>           <div class="card card-custom gutter-b">

        </div>


    </div>
</div>
<div class="d-flex flex-column-fluid">
<div class="container">


    <form action="{{ route('product.storeClassE') }}"  enctype="multipart/form-data" method="post">
        @csrf


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название проекта (организация): {{$ExternalOrgunit->first()->where('id', $products->org)->value('short_title')}}</strong>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Направление проекта
                        (искомый портрет): {{ $products->napr }}</strong>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Потребность
                        (заказ, целевиков): {{ $products->potr }}</strong>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Учебный год
                        (сроки реализации): {{ $products->god }}</strong>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Результаты отбора
                        (воронка и дашборд по ключевым показателям): {{ $products->potr}}</strong>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Локация: {{ $city->first()->where('code', $products->loc)->value('name')  }} {{ $city->first()->where('code', $products->loc)->value('socr')  }}., {{ $city->first()->where('code', $products->sity)->value('name')  }} {{ $city->first()->where('code', $products->sity)->value('socr')  }}.</strong>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Компания: {{ $School->find($products->scul)->where('id', $products->scul)->value('short_title') }}



                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select type="text" name="name[]" class="form-control" placeholder=" "  value=" " multiple >
                        <option>Выбрать все</option>
                            @foreach($classes->first()->where('school_id', $products->scul)->get() as $class)

                            <option value="{{$class->school_id}}"> {{ $class->number }}{{ $class->letter }} - {{ $class->year }}</option>

                            @endforeach
                    </select>


                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">


<x-inputs.submit type="btn-outline-success" link="{{ route('product.storeClassE', $products ) }}" title="{{ __('Сохранить и/или продолжить заполнять проект') }}"/>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Добавить город') }}"/>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Вернуться к списку проектов') }}"/>


            </div>
        </div>

    </form>
</div>
</div>
@endsection

