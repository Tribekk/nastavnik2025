@extends('layout.page')

<?php
/** @var \App\Quiz\Wrappers\CharacterTraitResultWrapper $wrapper */
?>

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        @include('quiz._details-' . $availableQuiz->quiz->slug)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



