@extends('layout.page')

@push('css')
    <style type="text/css">
        .st0{fill:#5C6670;}
    </style>
@endpush

@section('subheader')
    <x-subheader title="Управление учетной записью"/>
@endsection

@section('content')
    <div class="container">
        @include('user.profile._card')
    </div>
@endsection
