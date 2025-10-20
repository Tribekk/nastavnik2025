@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком направлений деятельности"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            {{ $activityKind->title }}
                        </div>
                        <div class="card-toolbar">
                            <form action="{{ route('admin.orgunits.activity_kinds.destroy', $activityKind) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger px-4 py-2 my-1 mr-1"
                                    onclick="return confirm('Вы действительно хотите удалить запись?')"
                                >
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @error('destroy')
                                    <x-alert type="danger" text="{{ $message }}"></x-alert>
                                @enderror

                                <form action="{{ route('admin.orgunits.activity_kinds.update', $activityKind) }}" method="post">
                                    @csrf
                                    @method('PATCH')

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название" value="{{ old('title', $activityKind->title) }}"/>

                                    <x-inputs.input-text-v id="short_title" name="short_title" title="Сокращенное название" value="{{ old('short_title', $activityKind->short_title) }}"/>

                                    <x-inputs.radio-group title="Используется" name="disabled">
                                        <x-inputs.radio title="Да" name="disabled" checked="{{ old('disabled', $activityKind->disabled_at ?? 'false') == 'false' }}" value="false"/>
                                        <x-inputs.radio title="Нет" name="disabled" checked="{{ !(old('disabled', $activityKind->disabled_at ?? 'false') == 'false') }}" value="true"/>
                                    </x-inputs.radio-group>

                                    <div class="d-flex">
                                        <x-inputs.submit title="Обновить"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('admin.orgunits.activity_kinds.view') }}" title="{{ __('К списку направлений деятельности') }}"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

