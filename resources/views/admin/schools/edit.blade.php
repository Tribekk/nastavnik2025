@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком компаний"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            {{ $school->short_title }}
                        </div>
                        <div class="card-toolbar">
                            <form action="{{ route('admin.schools.generate_token', $school) }}" method="post">
                                @csrf
                                @method('put')
                                <button
                                    type="submit"
                                    class="btn btn-success px-4 py-2 my-1 mr-1"
                                    onclick="return confirm('Вы действительно хотите создать новый ключ регистрации?')"
                                >
                                    Создать новый ключ
                                </button>
                            </form>
                            <form action="{{ route('admin.schools.destroy', $school) }}" method="post">
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

                    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                @include('admin.schools._edit._nav-items')
                            </ul>
                        </div>
                    </div>

                    <div class="card-body px-0">
                        <div class="tab-content">
                            @error('destroy')
                                <div class="px-7">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <x-alert type="danger" text="{{ $message }}" :close="false"></x-alert>
                                        </div>
                                    </div>
                                </div>
                            @enderror

                            @include('admin.schools._edit._school-tab')
                            @include('admin.schools._edit._classes-tab')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

