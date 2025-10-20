<div class="d-flex flex-wrap flex-md-nowrap @isset($selected) @if($selected) bg-alla text-white rounded @endif p-7 @endisset">
    <div class="mr-8 symbol symbol-circle symbol-md-140 symbol-100 w-145px my-2">
        <img src="{{ $user->avatarUrl }}" alt="{{ $user->fullName }}" class="img-fluid">
    </div>
    <div class="max-w-md-400px w-md-auto w-100 my-2">
        <h4 class="font-size-h3 font-hero @if(isset($selected) && $selected) text-white @else text-primary @endif">{{ $user->fullName }}</h4>
        <div class="font-size-h6">{!! $user->consultant->regalia_and_experience !!}</div>
        <h5 class="font-size-h6">Опыт работы {{ $user->consultant->experienceFormatted }}</h5>
    </div>
</div>
