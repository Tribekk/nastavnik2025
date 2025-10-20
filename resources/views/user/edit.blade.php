@extends('layout.page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-custom">
                    <div class="card-body">
                        @include('user._edit-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
