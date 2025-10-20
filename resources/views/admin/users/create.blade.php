@extends('layout.page')

@section('subheader')
    <x-subheader title="Управление списком пользователей"/>
@endsection

@section('content')
    <div class="container">
        <div class="card card-custom">

            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        @include('admin.users._create._nav-items')
                    </ul>
                </div>
            </div>

            <form id="user_create_form" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body px-0">
                    <div class="tab-content">
                        @include('admin.users._create._user-tab')
                        @include('admin.users._create._roles-tab')
                    </div>

                    <div class="row">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-7">
                            <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-4 ml-3 mr-3">
                                {{ __('Создать') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
