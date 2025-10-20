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


    <form action="{{ route('product.storeSchool') }}"   method="post">
        @csrf


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название проекта (организация): {{$ExternalOrgunit->first()->where('id', $products->org)->value('short_title')}}</strong>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Профиль: {{ $products->napr }}</strong>

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
                    <strong>Локация: </strong> <br>
                    @foreach (json_decode($products->loc)  as $Sch)
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <b>{{ $city->first()->where('code', $Sch)->value('name')  }} {{ $city->first()->where('code', $Sch)->value('socr')  }}</b>
                        <select type="text" name="sity[]" class="form-control" placeholder=" "  value=" " multiple size="5" >

                            @foreach($city->first()->where('socr',  'г')->orWhere('socr',  'п')->get() as $cit)
                                @if ( substr($cit->code, 0, 2)   ==   substr($Sch, 0, 2)  )
                                    <option value="{{$cit->code}}">
                                         {{$cit->name}}  {{$cit->socr}}
                                    </option>

                                @endif

                            @endforeach
                        </select>
                        @endforeach
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">


<x-inputs.submit type="btn-outline-success" link="{{ route('product.storeSchool', $products ) }}" title="{{ __('Выбрать компанию') }}"/>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Вернуться к списку проектов') }}"/>

            </div>
        </div>

    </form>
</div>
</div>
@endsection
