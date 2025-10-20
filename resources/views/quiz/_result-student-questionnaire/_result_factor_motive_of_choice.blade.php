@foreach($resultFactorMotiveOfChoice as $factor)
<div class="row">
    <div class="col-sm-6 order-1 order-sm-0">
        <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
            <div class="progress-bar rounded-pill {{ $factor->percentage >= 50 ? $progressColor ?? 'bg-primary' : 'bg-gray' }}" role="progressbar" style="width: {{ $factor->percentage }}%; z-index: 2;"></div>
            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
        </div>
    </div>
    <div class="col-sm-6 order-0 order-sm-1">
        <div x-data="{ seeFactor: false }" @click.away="seeFactor = false">
            <h4 class="font-size-h3 my-3 cursor-pointer" @click="seeFactor = !seeFactor">
            <span class="{{ $factor->percentage >= 50 ? $textColor ?? 'text-primary text-hover-danger' : 'text-dark-50 text-hover-dark' }}">
                {{ $factor->factor->title }}
            </span>
            </h4>

            <div class="my-3" x-show="seeFactor">
                <b>{{ $factor->factor->title }}</b> - {{ $factor->factor->description }}
            </div>
        </div>
    </div>
</div>
@endforeach

@push('css')
    <style>
        .bg-gray {
            background: #dedede;
        }

        .progress__bg-line {
            width: 100%;
            height: 2px;
            top: 50%;
            left: 0;
            transform: translate(0, -50%);
            position: absolute;
            border-radius: 0;
        }
    </style>
@endpush
