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
                        @include('admin.users._edit._nav-items')
                    </ul>
                </div>
            </div>

            <div class="card-body px-0">
                <div class="tab-content">
                    @include('admin.users._edit._user-tab')
                    @include('admin.users._edit._roles-tab')
                    @include('admin.users._edit._security-tab')
                </div>
            </div>

        </div>

    </div>
@endsection
