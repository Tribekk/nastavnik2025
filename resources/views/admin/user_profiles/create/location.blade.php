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

<form action="{{ route('product.storeScul') }}" enctype="multipart/form-data"  method="post">
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

<div x-data=" ">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-toolbar">
                <div class="btn btn-success px-4 py-2 my-1" data-target="#classModal" data-toggle="modal">
                    <i class="la la-plus"></i> Добавить профиль
                </div>
            </div>

        </div>

        <div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">


                    </div>
                    <div class="modal-body">
                        <h4 class="font-weight-bold font-size-h3 text-primary">Профиль</h4>

                        <x-inputs.input-text-v name="class.letter" type="text" min="1" title="Название" model="class.letter" :required="true"/>
                        <x-inputs.input-text-v name="class.letter" type="text" min="1" title="Какой-то текст" model="class.letter" :required="true"/>
                        <x-inputs.input-text-v name="class.students_count" type="number" step="1" min="1" max="9999" title="Количество сотрудников в отделе" model="class.students_count"/>
                        <x-inputs.input-text-v name="class.year" type="number" step="1" min="1990" max="2021" title="Год" model="class.year"/>

                        <div class="form-group">
                            <label for="profile_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите....</label>
                            <div wire:ignore>
                                <select name="class.profile_id" id="profile_id" style="width: 100%"></select>
                            </div>

                        </div>



                        <input type="text" name="school_id" value=" " hidden>


                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <button type="button" class="btn btn-light-success font-weight-bold mr-2"  >
                                    Сохранить
                                </button>
                                <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Отмена</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<x-inputs.input-text-v name="potr"   type="number"  max="999" title=" " placeholder="{{ __('Введите потребность (заказ, целевиков)') }}"/>
<x-inputs.input-text-v name="god"   title=" " placeholder="{{ __('Введите учебный год (сроки реализации)') }}"/>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Регион:</strong>
                    <x-tables.filter-inputs.select2
                                name="loc[]"
                                id="loc"
                                multiple
                                placeholder="{{ $city->where('code', $products->loc)->value('name') }}"
                                label=""
                                event="filterByParent"
                                indexUrl="{{ route('kladr.regions' ) }}"
                                showUrl="/kladr/regions"
                                value="{{ request()->region }}"></x-tables.filter-inputs.select2>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">


<x-inputs.submit type="btn-outline-success" link="{{ route('product.storeScul', $products ) }}" title="{{ __('Выбрать город') }}"/>
<x-inputs.button-link type="btn-outline-success" link="{{ route('products.store') }}" title="{{ __('Вернуться к списку проектов') }}"/>

            </div>
        </div>

    </form>
</div>
</div>


@endsection

