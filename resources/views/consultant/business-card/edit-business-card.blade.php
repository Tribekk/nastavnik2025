@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <h1 class="font-pixel text-primary font-size-h1">Визитная карточка</h1>
                    <h4 class="font-size-h3">Изменение данных визитной карточки</h4>

                    <form action="{{ route('consultant.business_card.update') }}" method="post" class="mt-12">
                        @csrf

                        <x-inputs.summernote-editor id="regalia_and_experience" name="regalia_and_experience" required title="Ваши регалии и опыт в области профориентации, карьерного консультирования, психологии, HR и т.п.:" value="{{ old('regalia_and_experience', $user->consultant->regalia_and_experience) }}"></x-inputs.summernote-editor>

                        <x-inputs.input-text-v title="Ваш суммарный опыт работы:"
                                               required
                                               value="{{ old('experience', $user->consultant->experience) }}"
                                               min="1"
                                               name="experience"
                                               id="experience"/>

                        <div class="mt-10">
                            <a href="{{ route('consultant.business_card') }}" class="btn btn-outline-primary font-size-h6">
                                Назад
                            </a>
                            <button class="btn btn-primary font-size-h6">
                                Продолжить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
