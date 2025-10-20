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
                        <!--<div class="btn btn-success px-4 py-2 my-1" data-target="#classModal" data-toggle="modal">
                            <i class="la la-plus"></i> Удалить проект
                        </div>-->
                
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
     
     
    <form action="{{ route('Product.edit_sity', $product->id) }}" method="POST">
        @csrf
     

        <div class="row">
            <!--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id:</strong>
                    <x-inputs.input-text-v name="id"   title=" " placeholder="{{ $product->id }}"/>
                     
                </div>
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Локация:</strong> 
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
                    <strong>Выберите новый регион:</strong>
                    <x-tables.filter-inputs.select2
                                name="loc[]"
                                id="loc"
                                multiple
                                placeholder="{{ __('Выберите новый регион') }}"
                                label=""
                                event="filterByParent"
                                indexUrl="{{ route('kladr.regions' ) }}"
                                showUrl="/kladr/regions"
                                value="{{ request()->region }}"></x-tables.filter-inputs.select2>
                                
                                 
                     
                </div>
            </div>
             
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success px-4 py-2 my-1">Сохранить и перейти к городам</button>
                <x-inputs.button-link type="btn-outline-success" link="{{ route('Product.edit_id', $product->id) }}" title="{{ __('Вернуться к редактированию проекта') }}"/>
            </div>
        </div>

    </form>
</div> 
</div> 
@endsection
