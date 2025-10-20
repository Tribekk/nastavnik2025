@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком ролей"/>
@endsection

@section ('content')
    <div class="container">
        <livewire:authorization.roles.index/>
    </div>
@endsection
