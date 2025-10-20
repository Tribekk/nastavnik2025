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

<form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
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
    ваывавыававы
<x-inputs.input-text-v name="potr"   type="number"  max="999" title=" " placeholder="{{ __('Введите потребность (заказ, целевиков)') }}"/>
<x-inputs.input-text-v name="god"   title=" " placeholder="{{ __('Введите учебный год (сроки реализации)') }}"/>

<x-tables.filter-inputs.select2
                                name="loc"
                                id="loc"
                                placeholder="Регион"
                                label="Локация"
                                event="filterByParent"
                                indexUrl="{{ route('kladr.regions' ) }}"
                                showUrl="/kladr/regions"
                                value="{{ request()->cities }}">
</x-tables.filter-inputs.select2>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Добавить локацию') }}"/>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Перейти к выбору городов и компаний') }}"/>

<x-tables.filter-inputs.select2
                                name="sity[]"
                                id="sity"
                                multiple="multiple"
                                placeholder="Все города"
                                label=""
                                event="filterByParent"
                                indexUrl="{{ route('kladr.cities')  }}"
                                showUrl="/kladr/cities"
                                value="{{ request()->city }}">
</x-tables.filter-inputs.select2>

<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Добавить город') }}"/>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Перейти к выбору компаний') }}"/>






<x-tables.filter-inputs.select2
                                name="scul[]"
                                id="scul"
                                multiple
                                autofocus
                                label="{{ __('Название компании') }}"
                                placeholder="{{ __('Выбраны все компании') }}"
                                event="filterByParent"
                                indexUrl="{{ route('admin.schools.view') }}"
                                showUrl="/admin/schools"
                                value="{{ request()->title}}">
</x-tables.filter-inputs.select2>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Добавить компанию') }}"/>

<br>
<br>






<x-inputs.submit type="btn-outline-success"  title="Сохранить проект"/>

<x-inputs.button-link type="btn-outline-success" link="{{ route('product.store') }}" title="{{ __('К списку проектов') }}"/>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
