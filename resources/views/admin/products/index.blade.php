@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание новых проектов"/>

@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">

 <x-card>
            <x-slot name="title">{{ __('Проекты') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link type="btn-outline-success" link="{{ route('product.storeLoc') }}" title="{{ __('Новые Проекты') }}" icon="la-plus"/>
            </x-slot>
            <x-tables.status/>

            <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">№</th>

            <th scope="col">Название проекта (организация)</th>
            <th scope="col">Локации</th>
            <th scope="col">Искомые профили (потребности)</th>
            <th scope="col">Учебный год (сроки реализации)</th>
            <!---
            <th scope="col">Количество компаний</th>
            <th scope="col">Количество классов</th>

            <th scope="col">Результаты отбора (воронка и дашборд по ключевым показателям)</th>
             --->
            <th scope="col">Управление</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products as $item)
        <tr>
            <td>
            <a href="{{ route('products.edit', $item->id) }}" class="font-weight-bolder link">{{ $item->id }}
            </a>
            </td>


            <td>@if (($item->org) == 0)
                <a href=" " class="font-weight-bolder link"> Без названия </a>


                @else
                <a href="{{ route('admin.orgunits.edit', $item->org) }}" class="font-weight-bolder link">
                    {{ $ExternalOrgunit->find($item->org)->where('id', $item->org)->value('short_title') }}
                </a>
                @endif
            </td>
            <td>
                @if (strpos($item->loc, ','))
                    @foreach (json_decode($item->loc) as $sc) <strong>{{ $title->where('code', $sc)->value('name') }} {{ $title->where('code', $sc)->value('socr') }} </strong><br>
                        @if (strpos($item->sity, ','))
                            @foreach (json_decode($item->sity) as $Sch)
                @if ( substr($sc, 0, 2)   ==   substr($Sch, 0, 2)  )
                {{ $title->where('code', $Sch)->value('name') }} {{ $title->where('code', $Sch)->value('socr') }}<br>
                @endif
                            @endforeach
                        @else
                        @if ( $item->sity == null) <br>



                        Вы выбрали все города в этой локации <br> @endif
                {{ $title->where('code', str_replace(['"', '[', ']'], "", $item->sity))->value('name')  }}
                        @endif
                    @endforeach
                    @else
                    <b>{{ $title->where('code', json_decode($item->loc))->value('name') }} {{ $title->first()->where('code', json_decode($item->loc))->value('socr')  }}  </b><br>
                @endif

                @if ( $item->sity == null) <br> Вы выбрали все города в этой локации @endif
                {{ $title->where('code', json_decode($item->sity))->value('name')  }}

            </td>
            <td>
                <a href=" " class="font-weight-bolder link">
                    {{ $item->napr }}
                </a>
                @if ($item->potr == null) @else  - {{ $item->potr }} чел. @endif
            </td>

            <td>
                {{ $item->god }}
            </td>

        <!---
            <td {{$dol=collect() }}>
                @if (  $item->scul == null ) <b>Вы выбрали все компании в этой локации </b><br>общее число компаний:
@if (json_decode($item->sity))
@foreach (json_decode($item->sity) as $Sch2)
@foreach ($School->first()->where('local', $Sch2)->get() as $Sch)
 <a {{$dol->push($Sch->id)}}></a>
@endforeach
@endforeach
{{count($dol->toArray())}}
@endif
@if ($item->sity == null)
@if (strpos($item->loc, ','))
                @foreach (json_decode($item->loc) as $sc4)

                 @foreach($title->first()->where('socr',  'г')->orWhere('socr',  'п')->get() as $cit2)
                 @if ( substr($cit2->code, 0, 2)   ==   substr($sc4, 0, 2)  )
                 @foreach($School  as $cit )
                 @if   ($cit->local == $cit2->code)
                  <a  {{$dol->push($cit->id)}} > </a>

                 @endif
                 @endforeach
                 @endif
                 @endforeach
                @endforeach

                {{count($dol->toArray())}}
                @else

                @foreach($School  as $cit )
                 @if   ( substr($cit->local, 0, 2) ==  substr(str_replace(['"', '[', ']'], "", $item->loc), 0, 2))
                 <a  {{$dol->push($cit->id)}} > </a>

                 @endif
                @endforeach
                {{count($dol->toArray())}}
@endif

@endif


                @else {{count(json_decode($item->scul))}}


                @endif
            </td>
            <td {{ $dil = collect() }}>
                @if ($item->name == null )
                <b>Вы выбрали все структурные подразделения: </b><br>
                @if (  $item->scul)

                @foreach (json_decode($item->scul) as $sc)
                @foreach($classes->first()->where('school_id', $sc)->get() as $sc2) <a  {{$dil->push($sc2->number)}} > </a>
                @endforeach
                @endforeach

              <a href="">  7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br></a>@endif
                <a href="">8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br></a>@endif
                <a href="">9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br></a>@endif
                <a href="">10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br></a>@endif
                <a href="">11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br></a>@endif


                @else
                @if  ( $item->sity)
                @foreach (json_decode($item->sity) as $sc3)
                @foreach($School  as $cit )
                @if   ($cit->local == $sc3)
                @foreach($classes->first()->where('school_id', $cit->id)->get() as $sc2) <a  {{$dil->push($sc2->number)}} > </a>
                @endforeach
                @endif
                @endforeach
                @endforeach

                <a href="">7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br></a>@endif
                <a href="">8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br></a>@endif
                <a href="">9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br></a>@endif
                <a href="">10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br></a>@endif
                <a href="">11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br></a>@endif

                @endif
                @endif
                @endif

                @if ($item->scul == null and $item->sity == null )
                @if (strpos($item->loc, ','))
                @foreach (json_decode($item->loc) as $sc4)

                 @foreach($title->first()->where('socr',  'г')->orWhere('socr',  'п')->get() as $cit2)
                 @if ( substr($cit2->code, 0, 2)   ==   substr($sc4, 0, 2)  )
                 @foreach($School  as $cit )
                 @if   ($cit->local == $cit2->code)
                 @foreach($classes->first()->where('school_id', $cit->id)->get() as $sc2) <a  {{$dil->push($sc2->number)}} > </a>
                 @endforeach
                 @endif
                 @endforeach
                 @endif
                 @endforeach
                @endforeach
                <a href="">7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br></a>@endif
                <a href="">8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br></a>@endif
                <a href="">9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br></a>@endif
                <a href="">10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br></a>@endif
                <a href="">11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br></a>@endif

                @else

                @foreach($School  as $cit )
                 @if   ( substr($cit->local, 0, 2) ==  substr(str_replace(['"', '[', ']'], "", $item->loc), 0, 2))
                 @foreach($classes->first()->where('school_id', $cit->id)->get() as $sc0) <a  {{$dil->push($sc0->number)}} > </a>
                 @endforeach
                 @endif
                @endforeach
                <a href="">7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br></a>@endif
                <a href="">8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br></a>@endif
                <a href="">9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br></a>@endif
                <a href="">10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br></a>@endif
                <a href="">11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br></a>@endif




                @endif
                @endif



                @if (strpos($item->name, ','))
                @foreach (json_decode($item->name) as $sc)

                @if (count(json_decode($item->name)) === count($dil->push($classes->first()->where('id', $sc)->value('number'))->collect()))

                <a href="">7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->toArray())['7']}}<br>@else 0<br></a>@endif
                <a href="">8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->toArray())['8']}}<br>@else 0<br></a>@endif
                <a href="">9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->toArray())['9']}}<br>@else 0<br></a>@endif
                <a href="">10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->toArray())['10']}}<br>@else 0<br></a>@endif
                <a href="">11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->toArray())['11']}}<br>@else 0<br></a>@endif
                @endif
                @endforeach

                @else
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $item->name))->value('number') == 7) <a href="">7 классов: 1 </a>@endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $item->name))->value('number') == 8) <a href="">8 классов: 1 </a>@endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $item->name))->value('number') == 9) <a href="">9 классов: 1 </a>@endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $item->name))->value('number') == 10) <a href="">10 классов: 1 @endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $item->name))->value('number') == 11) <a href="">11 классов: 1 </a>@endif

                @endif


            </td>
            <td>
                <a href=" " class="font-weight-bolder link">

                </a>
            </td>
            --->
            <td>
                <a href="{{ route('products.edit',$item->id) }}"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px">{{ __('Редактирование') }}</button></a><br>

            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
    <x-tables.pagination :items="$products"></x-tables.pagination>   </x-card>

    <div class="card card-custom gutter-b">


    </div>


        </div>
    </div>


@endsection

