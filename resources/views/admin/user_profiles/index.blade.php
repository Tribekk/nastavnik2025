@extends ('layout.page')

@section('subheader')
    <x-subheader title="Создание новых профилей"/>
 
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">

            @include('admin.user_profiles.include.result_messages')

 <x-card>
            <x-slot name="title">{{ __('Профили') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link type="btn-outline-success" link="{{ route('user_profiles.create') }}" title="{{ __('Новый Профиль') }}" icon="la-plus"/>
                <x-inputs.button-link type="btn-outline-success" link="{{ route('user_profiles.create_by_exists') }}" title="{{ __('Новый Профиль на основе существующего') }}" icon="la-plus"/>
            </x-slot>
            <x-tables.status/>

     <table class="table table-bordered table-striped">
         <thead>
         <tr>
             <th scope="col">№</th>

             <th scope="col">Название профиля</th>
             <th scope="col">Готовность профиля</th>
             <th scope="col"></th>
         </tr>
         </thead>
         <tbody>
         @foreach($userProfiles as $profile)

             <tr>
                 <td>
                     {{ $loop->iteration  }}
                 </td>
                 <td>
                   {{ $profile->title  }}
                 </td>
                 <td>
                     @if($profile->is_completed)
                         <font color="green"> {{  __('Заполнен') }}</font>
                     @else
                         <font color="red"> {{  __('Не заполнен') }}</font>
                     @endif
                 </td>
                 <td>
                     <x-inputs.button-link type="btn-outline-success" link="{{ route('user_profiles.edit',$profile->id) }}" title="{{ __('Редактировать профиль') }}"/>
                 </td>
             </tr>
         @endforeach
         </tbody>
     </table>


         <x-tables.pagination :items="$userProfiles"></x-tables.pagination>
 </x-card>
    
    <div class="card card-custom gutter-b">
 
        
    </div>


        </div>
    </div>


@endsection

