

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
                    <strong>Локация:</strong>
                    @foreach (json_decode($products->loc)  as $Sch)
                    <br><b>{{ $city->first()->where('code', $Sch)->value('name')  }} {{ $city->first()->where('code', $Sch)->value('socr')  }}</b>
                        @if ($products->sity == null) Вы выбрали все города из данной локации @else
                            @if ($products->scul == null) вы выбрали все компании @else
                        @foreach (json_decode($products->sity)  as $Sch2)
                        @if   (substr($Sch2, 0, 2)   ==   substr($Sch, 0, 2) )
                        {{ $city->first()->where('code', $Sch2)->value('socr')  }}. {{ $city->first()->where('code', $Sch2)->value('name')  }} <br>

                        @if ( $School->find($products->scul)->where('local', $Sch2)  )
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if ( $School->find($products->scul == null )) Вы выбрали все компании в этой локации @else
                            @foreach ($School->find($products->scul)   as $Sch4)
                            @if ($Sch4->local == $Sch2)
                                <strong> {{ $Sch4->short_title }}</strong>
                                <select type="text" name="name[]" class="form-control" placeholder=" "  value=" " multiple >


                                        @foreach($classes->first()->where('school_id', $Sch4->id)->get() as $class)

                                        <option value="{{$class->id}}"> {{ $class->number }}{{ $class->letter }} - {{ $class->year }}</option>

                                        @endforeach


                                </select>
                                @endif
                            @endforeach
                                @endif
                            </div>
                        </div>
                        @endif


                        @endif

                        @endforeach

                        @endif @endif


                    @endforeach


                    {{ $city->first()->where('code', $products->loc)->value('name')  }} {{ $city->first()->where('code', $products->loc)->value('socr')  }}.
                        @if ($products->sity == null) Вы выбрали все города из данной локации @else
                        {{ $city->first()->where('code', $products->sity)->value('name')  }} {{ $city->first()->where('code', $products->sity)->value('socr')  }}.
                        @endif

                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">


<x-inputs.submit type="btn-outline-success" link="{{ route('product.storeClassE', $products ) }}" title="{{ __('Сохранить') }}"/>


            </div>
        </div>

    </form>
</div>
</div>
@endsection

