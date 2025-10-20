@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание новых проектов"/>
@endsection


@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новый Проект 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

<form action="{{ route('product.storeLoc') }}" enctype="multipart/form-data" method="post">
                                    @csrf

<x-tables.filter-inputs.select2
                                name="org"
                                id="org"
                                 
                                required
                                label="{{ __('Организация') }}"
                                placeholder="{{ __('Введите название организации') }}"
                                event="filterByParent"
                                indexUrl="{{ route('admin.orgunits.view') }}"
                                showUrl="/admin/orgunits"
                                value="{{ request()->parent_id }}">
</x-tables.filter-inputs.select2>

<x-inputs.input-text-v name="napr"   title=" " placeholder="{{ __('Введите направление проекта (искомый портрет)') }}"/>
<x-inputs.input-text-v name="potr"   type="number"  max="999" title=" " placeholder="{{ __('Введите потребность (заказ, целевиков)') }}"/>
<x-inputs.input-text-v name="god"   title=" " placeholder="{{ __('Введите учебный год (сроки реализации)') }}"/>
 
<x-tables.filter-inputs.select2
                                name="loc"
                                id="loc"
                                required="required"
                                placeholder="Регион"
                                label="Регион"
                                event="filterByParent"
                                indexUrl="{{ route('kladr.regions' ) }}"
                                showUrl="/kladr/regions"
                                value="{{ request()->cities }}">
</x-tables.filter-inputs.select2>
<br><br>
<x-inputs.submit type="btn-outline-success" link="{{ route('product.storeLoc') }}" title="{{ __('Сохранить и продолжить заполнять') }}"/>
 

<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Вернуться к списку проектов') }}"/>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
