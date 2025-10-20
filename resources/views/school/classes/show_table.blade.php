@extends('layout.page')

@section('subheader')
    <x-subheader title="Мои структурные подразделения"/>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="mt-3 d-flex flex-wrap">
                        <div class="flex-grow-1">
                            <h2 class="font-size-h2 font-weight-bold text-break">{{ $class->school->short_title ?? '-' }}. Структурное подразделение {{ $class->number }}{{ $class->letter }} (год: {{ $class->year ? $class->year : 'не указан' }})</h2>
                        </div>
                        <div class="w-md-625px w-100 justify-content-md-end d-flex mt-4 mt-md-0 mb-4 mb-md-0">
                            @if(Auth::user()->isTeacher || Auth::user()->isCurator)
                                <a href="{{ route('school.classes.list') }}" class="btn btn-success"><i class="la la-reply"></i>К списку структурных подразделений</a>&nbsp;&nbsp;
                                <!--<a href="{{ route('school.classes.add_student_with_parent',$class->id) }}" class="btn btn-success">Добавить наставника</a>-->
                            @endif
                            <a href="{{ route('school.classes.show', $class) }}" class="ml-2 btn btn-outline-success"><i class="la la-address-card"></i>Карточки</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($students->count() > 0)
                        @include('school.classes._show_table._table')
                    @else
                        <x-alert type="info" text="На данный момент у структурного подразделения нет наставников" :close="false"></x-alert>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
