<div>
    <!-- выбор региона -->
    <div>
        <livewire:components.select2
                name="{{$name}}-region" id="{{$name}}-region"
                url="{{ route('kladr.regions') }}"
                event="setRegion{{$name}}"
                placeholder="Регион"
                selected="{{ $region ?? '' }}"
                selectedItemUrl="/kladr/regions"
        />

        <input type="text" name="{{$name}}[region]" value="{{ $region }}" hidden>

        <div wire:ignore>
            @error("{$name}.region")
            <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- выбор города -->
    <div class="mt-3">
        <livewire:components.select2
                name="{{$name}}-city" id="{{$name}}-city"
                url="{{ route('kladr.cities') . ($region ? '?region='.str_replace('0', '', $region) : '') }}"
                event="setCity{{$name}}"
                placeholder="Город"
                selected="{{ $city ?? '' }}"
                selectedItemUrl="/kladr/cities"
        />

        <input type="text" name="{{$name}}[city]" value="{{ $city }}" hidden>

        <div wire:ignore>
            @error("{$name}.city")
            <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            /**
             * Ивенты на обновление полей
             */
            window.livewire.on('setRegion{{$name}}', val => @this.call('setRegion', val));
            window.livewire.on('setCity{{$name}}', val => @this.call('setCity', val));

            /**
             * Ивены реинизиализации select2
             */
        @this.on('reInitCity', _ => {
                const region = (@this.get('region').toString()).substr(0, 2);
            const city = (@this.get('city').toString());

            let params = new URLSearchParams();
            if(region) params.append('region', region);

            initSelect2(
                '{{$name}}-city',
                'Город',
                'setCity{{$name}}',
                `{{ route('kladr.cities') }}?${params.toString()}`,
                '/kladr/cities',
                city
            );
        });


        });
    </script>
@endpush
