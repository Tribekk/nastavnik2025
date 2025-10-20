@extends('layout.base')

@section('subheader')
    <x-subheader title="Консультация {{ $consultation->formattedStartAt }}"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="font-size-h2 font-weight-bold text-primary">Обратная связь</h3>
                <h3 class="font-size-h3 text-primary">Пожалуйста, дайте Вашу оценку по этапам реализации проекта</h3>

                <form action="{{ route('consultations.feedback', $consultation) }}" method="post" class="mt-10">
                    @csrf

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark required">Ваши эмоции, состояние, настроение по итогам реализации этапа</label>
                        <livewire:feedback.mark-emotions id="emotion" name="emotion" value="{{ old('emotion') }}"></livewire:feedback.mark-emotions>

                        @error('emotion')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if(Auth::user()->isParent || Auth::user()->isStudent && !$consultation->parent_id)
                        <x-inputs.text-area name="text" id="text" title="Ваш отзыв по итогам проведения консультации"/>
                    @endif

                    <div class="button-group">
                        <a href="{{ route('consultations.list') }}" class="btn btn-outline-primary rounded-pill px-8 mx-sm-2 my-2 font-size-h5 w-100 w-sm-auto">К списку консультаций</a>
                        <button class="btn btn-primary rounded-pill px-8 mx-sm-2 my-2 font-size-h5 w-100 w-sm-auto">Отправить отзыв</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
