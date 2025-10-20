@extends ('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section ('content')
    <div class="container">
        <x-card>
            <x-slot name="title">Кабинет работодателя</x-slot>
            <x-alert type="info" text="Для отображения необходимо привязать Организацию в настройках профиля" :close="false"></x-alert>
        </x-card>
    </div>
@endsection

