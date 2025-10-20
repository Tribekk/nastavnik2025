@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @unless (Auth::user()->haveType)
                @include('home._widgets._attach-role')
            @endunless
        </div>
    </div>
@endsection
