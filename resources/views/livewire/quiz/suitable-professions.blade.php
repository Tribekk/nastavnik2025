<div>
    <div class="row">
        @foreach($availableQuiz->quiz->questions as $question)
            <div class="border shadow-sm font-size-h3 p-10 text-center col-md-6 my-5">
                <div class="mb-2">
                    {{ $question->content }}
                </div>
                <div class="mb-3">
                    {!! $question->description !!}
                </div>
                <div class="mt-12">
                    <div class="form-group mb-0">
                        <div class="d-flex flex-wrap row justify-content-center">
                            @foreach($question->answers as $answer)
                                <div
                                    x-data="{hover: false}"
                                    x-on:mouseover="hover = true"
                                    x-on:mouseout="hover = false"
                                    class="@if($answer->madeByUser(Auth::id())) selected @endif position-relative mx-md-2 mb-4 min-w-md-140px font-size-base p-1 cursor-pointer col-6 col-md-auto w-md-30"
                                    wire:click="switch({{ $question->id }}, {{ $answer->id }})">
                                    @if($answer->madeByUser(Auth::id()))
                                        <img src="{{ asset('img/icons/' . $answer->answerable->selectedImage) }}" class="img-fluid">
                                    @else
                                        <img src="{{ asset('img/icons/' . $answer->answerable->notSelectedImage) }}" class="img-fluid">
                                    @endif
                                    <p class="font-size-lg font-weight-bold">{{ $answer->title }}</p>

                                    <div class="text-dark-50 font-size-lg text-left position-absolute max-w-140px bg-secondary px-4 py-5" x-show="hover" style="z-index: 2; left: -50px; top: 100px; border-radius: 5px;">{{$answer->answerable->description}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-10 d-flex flex-column flex-md-row justify-content-between">
        <div>
            <button class="btn btn-success font-size-h5" wire:click="finishQuiz">
                Определить мою профессию
            </button>
        </div>
    </div>
</div>
