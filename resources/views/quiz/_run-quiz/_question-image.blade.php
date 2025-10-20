<label for="" class="d-block font-size-h6 font-hero">Кликните по изображению для выбора:</label>
<div class="row">
    @foreach($question->answers as $answer)
        <div wire:click="answerTheQuestion({{ $question->id }}, {{ $answer->id }})"
             class="col-md-2 col-sm-3 col-6 my-2 cursor-pointer hover-opacity-50 border-success rounded text-center {{ $answer->madeByUser(Auth::id()) ? 'border border-2' : '' }} px-6 py-5">
            <img src="{{ $answer->image_path }}" alt="" class="img-fluid max-h-100px max-h-md-150px">
        </div>
    @endforeach
</div>
