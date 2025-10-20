@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление аудиторией"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            {{ $audience->title }}
                        </div>
                        <div class="card-toolbar">
                            <form action="{{ route('employer.events.audience.destroy', $audience) }}" method="post">
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
                                <form action="{{ route('employer.events.audience.update', $audience) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PATCH')

                                    @error('error')
                                        <x-alert type="danger" text="{{ $message }}" :close="false"></x-alert>
                                    @enderror

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Название" value="{{ old('title', $audience->title) }}"/>

                                    <div class="d-flex">
                                        <x-inputs.submit title="Обновить"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('employer.events.audience.view') }}" title="{{ __('К списку аудиторий') }}"/>
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

