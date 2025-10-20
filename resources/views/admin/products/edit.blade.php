@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание новых проектов"/>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">

 <x-card>
            <x-slot name="title">@if (($product->org) == 0)
                Редактировать проект № {{ $product->id }}
                @else
                Редактировать проект № {{ $product->id }} для {{ $ExternalOrgunit->find($product->org)->where('id', $product->org)->value('short_title') }}
                @endif
            </x-slot>
            <x-slot name="toolbar">
                <div x-data=" ">
                    <div class="card card-custom">
                        <div class="btn btn-success px-4 py-2 my-1" data-target="#classModal" data-toggle="modal">
                            <i class="la la-plus"></i> Удалить проект
                        </div>

                        <div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-body">
                                            <h4 class="font-weight-bold font-size-h3 text-primary">Удалить проект?</h4>

                                            <div>
                                                <x-inputs.button-link type="btn-outline-success" link="{{ route('product.del', $product->id) }}" title="{{ __('Удалить проект') }}" icon="la-plus"/>

                                                <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Отмена</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </x-slot>
            <x-tables.status/>
        </x-card>           <div class="card card-custom gutter-b">

        </div>


    </div>
</div>
<div class="d-flex flex-column-fluid">
<div class="container">

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название проекта (организация):
                        @if (($product->org) == 0)
                            Без названия
                        @else
                            {{ $ExternalOrgunit->find($product->org)->where('id', $product->org)->value('short_title') }}
                        @endif
                    </strong>

                    @if (($product->org) == 0)
                    <x-tables.filter-inputs.select2
                    name="org"
                    id="org"
                    multiple
                    required
                    label=" "
                    placeholder="{{ __('Без названия') }}"
                    event="filterByParent"
                    indexUrl="{{ route('admin.orgunits.view') }}"
                    showUrl="/admin/orgunits"
                    value="{{ request()->parent_id }}">
                    </x-tables.filter-inputs.select2>

                    @else
                    <x-tables.filter-inputs.select2
                    name="org"
                    id="org"
                    multiple
                    required
                    label=" "
                    placeholder="{{ $ExternalOrgunit->find($product->org)->where('id', $product->org)->value('short_title') }}"
                    event="filterByParent"
                    indexUrl="{{ route('admin.orgunits.view') }}"
                    showUrl="/admin/orgunits"
                    value="{{ request()->parent_id }}">
                    </x-tables.filter-inputs.select2>

                    @endif

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Профиль: {{ $product->napr }}</strong>
                    <x-inputs.select2 id="activity_kind_id" name="activity_kind_id[]"
                                      required title="Профиль"
                                      placeholder="Выбор профиля" event="setActivityKindId"
                                      multiple
                                      value=""
                                      url="{{ route('admin.orgunits.activity_kinds.view') }}"
                                      selected-url="/admin/orgunits/activity_kinds"
                    />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Потребность
                        (заказ, целевиков):</strong>
                    <input type="text" name="potr" class="form-control" placeholder="{{ $product->potr }}"
                           value="{{ $product->potr }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Учебный год
                        (сроки реализации):</strong>
                    <input type="text" name="title" class="form-control" placeholder="{{ $product->god }}"
                           value="{{ $product->god }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Локация <a href="{{ route('Product.edit_loc', $product->id) }}">(изменить)</a>:</strong>
<br>
                    @if (strpos($product->loc, ','))
                    @foreach (json_decode($product->loc) as $sc) <strong>{{ $title->where('code', $sc)->value('name') }} {{ $title->where('code', $sc)->value('socr') }} </strong><br>
                        @if (strpos($product->sity, ','))
                            @foreach (json_decode($product->sity) as $Sch)
                @if ( substr($sc, 0, 2)   ==   substr($Sch, 0, 2)  )
                {{ $title->where('code', $Sch)->value('name') }} {{ $title->where('code', $Sch)->value('socr') }}<br>
                @endif
                            @endforeach
                        @else
                        @if ( $product->sity == null) <br>



                        Вы выбрали все города в этой локации <br> @endif
                {{ $title->where('code', str_replace(['"', '[', ']'], "", $product->sity))->value('name')  }}
                        @endif
                    @endforeach
                    @else
                    <b>{{ $title->where('code', json_decode($product->loc))->value('name') }} {{ $title->first()->where('code', json_decode($product->loc))->value('socr')  }}  </b><br>
                @endif

                @if ( $product->sity == null) <br> Вы выбрали все города в этой локации @endif
                {{ $title->where('code', json_decode($product->sity))->value('name')  }}
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
            <div {{$dol=collect() }}>
                @if (  $product->scul == null ) <b>Вы выбрали все компании в этой локации <a href="{{ route('Product.edit_schul2', $product->id) }}">(изменить)</a></b><br>общее число компаний:
@if (json_decode($product->sity))
@foreach (json_decode($product->sity) as $Sch2)
@foreach ($School->first()->where('local', $Sch2)->get() as $Sch)
 <a {{$dol->push($Sch->id)}}></a>
@endforeach
@endforeach
{{count($dol->toArray())}}
@endif
@if ($product->sity == null)
@if (strpos($product->loc, ','))
                @foreach (json_decode($product->loc) as $sc4)

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
                 @if   ( substr($cit->local, 0, 2) ==  substr(str_replace(['"', '[', ']'], "", $product->loc), 0, 2))
                 <a  {{$dol->push($cit->id)}} > </a>

                 @endif
                @endforeach
                {{count($dol->toArray())}}
@endif

@endif

                @else <strong>Число компаний <a href="{{ route('Product.edit_schul2', $product->id) }}">(изменить)</a>:</strong> {{count(json_decode($product->scul))}}<br>
                @foreach (json_decode($product->scul) as $sc)
                    {{$sc}}<br>
                @endforeach


                @endif
            </div>
        </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
            <div {{ $dil = collect() }}>
                @if ($product->name == null )
                <b>Вы выбрали все структурные подразделения <a href="{{ route('Product.edit_class2', $product->id) }}">(изменить): </a></b><br>
                @if (  $product->scul)

                @foreach (json_decode($product->scul) as $sc)
                @foreach($classes->first()->where('school_id', $sc)->get() as $sc2) <a  {{$dil->push($sc2->number)}} > </a>
                @endforeach
                @endforeach

            <a href="{{ route('Product.edit_class2', $product->id) }}">(изменить):  7 классов:
                7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br> @endif
                8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br> @endif
                9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br> @endif
                10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br> @endif
                11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br> @endif
            </a>

                @else
                @if  ( $product->sity)
                @foreach (json_decode($product->sity) as $sc3)
                @foreach($School  as $cit )
                @if   ($cit->local == $sc3)
                @foreach($classes->first()->where('school_id', $cit->id)->get() as $sc2) <a  {{$dil->push($sc2->number)}} > </a>
                @endforeach
                @endif
                @endforeach
                @endforeach

            <a href="{{ route('Product.edit_class', $product->id) }}">(изменить):  7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br>@endif
                8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br>@endif
                9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br>@endif
                10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br>@endif
                11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br>@endif
            </a>
                @endif
                @endif
                @endif

                @if ($product->scul == null and $product->sity == null )
                @if (strpos($product->loc, ','))
                @foreach (json_decode($product->loc) as $sc4)

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
            <a href="{{ route('Product.edit_class2', $product->id) }}">(изменить):  7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br>@endif
                8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br>@endif
                9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br>@endif
                10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br>@endif
                11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br>@endif
            </a>

                @else

                @foreach($School  as $cit )
                 @if   ( substr($cit->local, 0, 2) ==  substr(str_replace(['"', '[', ']'], "", $product->loc), 0, 2))
                 @foreach($classes->first()->where('school_id', $cit->id)->get() as $sc0) <a  {{$dil->push($sc0->number)}} > </a>
                 @endforeach
                 @endif
                @endforeach
            <a href="{{ route('Product.edit_class2', $product->id) }}">(изменить):
                7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->filter()->toArray())['7']}}<br>@else 0<br>@endif
                8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->filter()->toArray())['8']}}<br>@else 0<br>@endif
                9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->filter()->toArray())['9']}}<br>@else 0<br>@endif
                10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->filter()->toArray())['10']}}<br>@else 0<br>@endif
                11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->filter()->toArray())['11']}}<br>@else 0<br>@endif
            </a>



                @endif
                @endif



                @if (is_array($product->name))
                @foreach ( ($product->name) as $sc)

                @if (count( ($product->name)) === count($dil->push($classes->first()->where('id', $sc)->value('number'))->collect()))

            <a href="{{ route('Product.edit_class2', $product->id) }}">(изменить):
                7 классов:
                @if ($dil->contains(7)) {{  array_count_values($dil->toArray())['7']}}<br>@else 0<br>@endif
                8 классов:
                @if ($dil->contains(8)) {{  array_count_values($dil->toArray())['8']}}<br>@else 0<br>@endif
                9 классов:
                @if ($dil->contains(9)) {{  array_count_values($dil->toArray())['9']}}<br>@else 0<br>@endif
                10 классов:
                @if ($dil->contains(10)) {{  array_count_values($dil->toArray())['10']}}<br>@else 0<br>@endif
                11 классов:
                @if ($dil->contains(11)) {{  array_count_values($dil->toArray())['11']}}<br>@else 0<br>@endif
            </a>
                @endif
                @endforeach

                @else
            <strong>Структурные подразделения</strong> <a href="{{ route('Product.edit_class2', $product->id) }}">(изменить):<br>
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $product->name))->value('number') == 7) 7 классов: 1 @endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $product->name))->value('number') == 8) 8 классов: 1 @endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $product->name))->value('number') == 9) 9 классов: 1 @endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $product->name))->value('number') == 10) 10 классов: 1 @endif
                @if ($classes->first()->where('id', str_replace(['"', '[', ']'], "", $product->name))->value('number') == 11) 11 классов: 1 @endif
            </a>
                @endif


            </div></div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success px-4 py-2 my-1">Сохранить изменения</button><x-inputs.button-link type="btn-outline-success" link="{{ route('products.index') }}" title="{{ __('Вернуться к списку проектов') }}"/>
            </div>
        </div>

    </form>
</div>
</div>
@endsection
