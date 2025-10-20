@extends('layout.page')

@section('subheader')
    <x-subheader title="Консультации"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card card-custom">
            @if($consultation->state->code() != 'not-verified')
                <div class="card-header">
                    <div class="w-100 justify-content-end card-toolbar">
                        <form action="{{ route('consultations.destroy', $consultation) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Вы действительно хотите удалить запись?')" class="btn btn-danger font-weight-bolder font-size-h6 px-4 py-2 my-1 mr-1">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                            @include('consultations._edit._nav-items')
                        </ul>
                    </div>
                </div>
            @endif

            <div class="card-body px-2">
                <div class="tab-content">
                    @include('consultations._edit._consultation-tab')

                    @if($consultation->state->code() != 'not-verified')
                        @include('consultations._edit._report-tab')
                    @endif
                </div>

                @if($consultation->state->code() == 'not-verified')
                    <div class="mt-12 button-group px-7">
                        <form action="{{ route('consultations.destroy', $consultation) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Вы действительно хотите отклонить запись?')" class="btn btn-primary font-weight-bolder font-size-h6 px-4 py-2 my-1 mr-1">
                                <i class="la la-remove"></i>Отклонить
                            </button>
                        </form>
                        <form action="{{ route('consultations.confirm', $consultation) }}" method="post" class="d-inline-block">
                            @csrf
                            <button onclick="return confirm('Вы действительно хотите подтвердить запись?')" class="btn btn-success font-weight-bolder font-size-h6 px-4 py-2 my-1 mr-1">
                                <i class="la la-chevron-down"></i>Подтвердить
                            </button>
                        </form>
                        <a href="{{ route('consultations.list') }}" class="btn btn-outline-success font-weight-bolder font-size-h6 px-4 py-2 my-1 mr-1">К списку консультаций</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
