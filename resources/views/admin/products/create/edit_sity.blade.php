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
                Редактировать проект № {{ $products->id }} для {{ $ExternalOrgunit->find($products->org)->where('id', $products->org)->value('short_title') }}
                @endif
            </x-slot>

            <x-tables.status/>
        </x-card>           <div class="card card-custom gutter-b">

        </div>


    </div>
</div>
<div class="d-flex flex-column-fluid">
<div class="container">


    <form action="{{ route('Product.edit_schul', $product->id) }}" method="POST">
        @csrf


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Локация: </strong> <br>
                    @if ( $products->loc )
                    @foreach (  ($products->loc)  as $Sch)
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
                        @else

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <b>{{ $city->first()->where('code', str_replace(['"', '[', ']'], "",$products->loc))->value('name')  }} {{ $city->first()->where('code', str_replace(['"', '[', ']'], "",$products->loc))->value('socr')  }}</b>
                        <select type="text" name="sity[]" class="form-control" placeholder=" "  value=" " multiple size="5" >

                            @foreach($city->first()->where('socr',  'г')->orWhere('socr',  'п')->get() as $cit)
                                @if ( substr($cit->code, 0, 2)   ==   substr(str_replace(['"', '[', ']'], "",$products->loc), 0, 2)  )
                                    <option value="{{$cit->code}}">
                                         {{$cit->name}}  {{$cit->socr}}
                                    </option>

                                @endif

                            @endforeach
                        </select>

                        @endif

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-success px-4 py-2 my-1">Сохранить и выбрать компании</button>

                <x-inputs.button-link type="btn-outline-success" link="{{ route('Product.edit_id', $product->id) }}" title="{{ __('Вернуться к редактированию проекта') }}"/>


            </div>
        </div>

    </form>
</div>
</div>
@endsection
