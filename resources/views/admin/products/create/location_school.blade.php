

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


    <form action="{{ route('product.storeClass') }}"   method="post">
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
                    <strong>Локация:</strong> <br>
                    @foreach (json_decode($products->loc)  as $Sch)
                    <b>{{ $city->first()->where('code', $Sch)->value('name')  }} {{ $city->first()->where('code', $Sch)->value('socr')  }}</b>

                        @if ($products->sity == null) Вы выбрали все города из данной локации @else
                    @foreach ($products->sity  as $Sch2)
                    @if   (substr($Sch2, 0, 2)   ==   substr($Sch, 0, 2) )
                    {{ $city->first()->where('code', $Sch2)->value('socr')  }}. {{ $city->first()->where('code', $Sch2)->value('name')  }}  <br>

                    <select type="text" name="scul[]" class="form-control" placeholder=" "  value=" " multiple size="5" >
                        @foreach($School  as $cit )
                        @if   ($cit->local == $Sch2)
                                <option value="{{$cit->id}}">
                                    {{$cit->short_title}}
                                </option>
                        @endif
                        @endforeach
                    </select>

                    @endif
                    @endforeach

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    @endif
                    @endforeach



                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">


<x-inputs.submit type="btn-outline-success" link="{{ route('product.storeClass', $products ) }}" title="{{ __('Выбрать структурные подразделения') }}"/>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Сохранить и вернуться к списку проектов') }}"/>

            </div>
        </div>

    </form>
</div>
</div>
@endsection

