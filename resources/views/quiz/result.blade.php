@extends('layout.page')

@section('subheader')
    <x-subheader title="Результаты"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        @include('quiz._result-' . $availableQuiz->quiz->slug)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
