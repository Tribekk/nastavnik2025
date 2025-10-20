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


    <form action="{{ route('Product.edit_class', $product->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Локация: </strong> <br>
                    @if (strpos($products->loc, ','))
                    @foreach (json_decode($products->loc)  as $Sch)
                    <b>{{ $city->first()->where('code', $Sch)->value('name')  }} {{ $city->first()->where('code', $Sch)->value('socr')  }}</b>

                        @if ($products->sity == null) Вы выбрали все города из данной локации @endif

                        @if (is_array($products->sity))
                        @foreach (($products->sity)  as $Sch2)
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
                        @else
                    @foreach ( json_decode($products->sity)  as $Sch2)
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




                        @else
                        <b>{{ $city->first()->where('code', str_replace(['"', '[', ']'], "",$products->loc))->value('name')  }} {{ $city->first()->where('code', str_replace(['"', '[', ']'], "",$products->loc))->value('socr')  }}</b>

                        @if ($products->sity == null) Вы выбрали все города из данной локации @endif

                        @if (is_array($products->sity))
                        @foreach (($products->sity)  as $Sch2)
                    @if   (substr($Sch2, 0, 2)   ==   substr(str_replace(['"', '[', ']'], "", $products->loc), 0, 2) )
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
                        @else


                        @foreach ( json_decode($products->sity)  as $Sch2)
                    @if   (substr($Sch2, 0, 2)   ==   substr(str_replace(['"', '[', ']'], "", $products->loc), 0, 2) )
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
                        @endif

                        @endif
                    </div>
                </div>




            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-success px-4 py-2 my-1">Сохранить и выбрать структурные подразделения</button>

                <x-inputs.button-link type="btn-outline-success" link="{{ route('Product.edit_id', $product->id) }}" title="{{ __('Вернуться к редактированию проекта') }}"/>


            </div>
        </div>

    </form>
</div>
</div>
@endsection
