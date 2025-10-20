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


    <form action="{{ route('Product.edit_class_up', $product->id) }}" method="POST">
        @csrf


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Локация: </strong> <br>
                    @if (strpos($products->loc, ','))
                    @foreach (json_decode($products->loc)  as $Sch)
                    <br><b>{{ $city->first()->where('code', $Sch)->value('name')  }} {{ $city->first()->where('code', $Sch)->value('socr')  }}</b> <br>
                        @if ($products->sity == null) Вы выбрали все города из данной локации @else
                            @if ($products->scul == null) вы выбрали все компании @else
        @foreach (json_decode($products->sity)  as $Sch2)
        @if   (substr($Sch2, 0, 2)   ==   substr($Sch, 0, 2) )
                {{ $city->first()->where('code', $Sch2)->value('socr')  }}. {{ $city->first()->where('code', $Sch2)->value('name')  }} <br>
@if (is_array($products->scul) )
нет выбранных компаний <br>
@else
               @foreach (json_decode($products->scul) as $dd)



                    @if ( $School->find($dd)->where('local', $Sch2)  )
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                        @if ( $School->find($dd == null )) Вы выбрали все компании в этой локации @else

                                @if ($School->find($dd)->value('local') == $Sch2)
                                    <strong> {{ $School->find($dd)->value('short_title') }}</strong>
                                    <select type="text" name="name[]" class="form-control" placeholder=" "  value=" " multiple >
                                        @foreach($classes->first()->where('school_id', $School->find($dd)->value('id'))->get() as $class)
                                            <option value="{{$class->id}}"> {{ $class->number }}{{ $class->letter }} - {{ $class->year }}</option>
                                        @endforeach
                                    </select>
                                @endif

                        @endif
                            </div>
                        </div>
                    @endif
                @endforeach
@endif
        @endif
        @endforeach
    @endif
    @endif
    @endforeach



                        @else
                        <br><b>{{ $city->first()->where('code', str_replace(['"', '[', ']'], "",$products->loc))->value('name')  }} {{ $city->first()->where('code', str_replace(['"', '[', ']'], "",$products->loc))->value('socr')  }}</b>
                        @if ($products->sity == null) Вы выбрали все города из данной локации @else
                            @if ($products->scul == null) вы выбрали все компании @else
                        @foreach (json_decode($products->sity)  as $Sch2)
                        @if   (substr($Sch2, 0, 2)   ==   substr(str_replace(['"', '[', ']'], "",$products->loc), 0, 2) )
                        {{ $city->first()->where('code', $Sch2)->value('socr')  }}. {{ $city->first()->where('code', $Sch2)->value('name')  }} <br>
                    @if (is_array($products->scul))
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
                    @else
                    @if ( $School->find(json_decode($products->scul))->where('local', $Sch2)  )
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            @if ( $School->find($products->scul == null )) Вы выбрали все компании в этой локации @else
                        @foreach ($School->find(json_decode($products->scul))   as $Sch4)
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
                        @endif
                        @endforeach
                        @endif  @endif @endif

                </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
      <strong>Классов не обнаружено</strong></div>
    </div>
</div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-success px-4 py-2 my-1">Сохранить</button>

                <x-inputs.button-link type="btn-outline-success" link="{{ route('Product.edit_id', $product->id) }}" title="{{ __('Вернуться к редактированию проекта') }}"/>


            </div>
        </div>

    </form>
</div>
</div>
@endsection
