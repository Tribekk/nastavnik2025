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


    <!-- выбор улицы -->
    <div class="mt-3" id="div-{{$name}}-street" style="display:block">
        <livewire:components.select2
            name="{{$name}}-street" id="{{$name}}-street"
            url="{{ route('kladr.streets') }}"
            event="setStreet{{$name}}"
            placeholder="Улица"
            selected="{{ $street ?? '' }}"
            selectedItemUrl="/kladr/streets"
            style="display:block"

        />

        <input type="text" name="{{$name}}[street]" value="{{ $street }}" hidden>

        <div wire:ignore>
            @error("{$name}.street")
                <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mt-3" id="div-{{$name}}-house" style="display:block">

        <x-inputs.input-text-v name="{{$name}}[house]" id="{{$name}}-house" value="{{ $house }}" placeholder="Дом"/>
    </div>




</div>

@push('scripts')
    <script>
        $(document).ready(function () {


            if('{{$name}}'.includes('search_location')) {

                document.getElementById('div-{{$name}}-street').style.display="none";
                document.getElementById('div-{{$name}}-house').style.display="none";

            }


            /**
             * Ивенты на обновление полей
             */
            window.livewire.on('setRegion{{$name}}', val => @this.call('setRegion', val));
            window.livewire.on('setCity{{$name}}', val => @this.call('setCity', val));
            window.livewire.on('setStreet{{$name}}', val => @this.call('setStreet', val));

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



            if('{{$name}}'.includes('search_location'))
            {
                document.getElementById('div-{{$name}}-street').style.display="none";
                document.getElementById('div-{{$name}}-house').style.display="none";
            } else {


            }
            });


            @this.on('reInitStreet', _ => {
                const region = (@this.get('region').toString()).substr(0, 2);
                const city = (@this.get('city').toString());

                let params = new URLSearchParams();
                if(region) params.append('region', region);
                if(city) params.append('city', city);


                initSelect2(
                    '{{$name}}-street',
                    'Улица',
                    'setStreet{{$name}}',
                    `{{ route('kladr.streets') }}?${params.toString()}`,
                    '/kladr/streets',
                    ''
                );
            if('{{$name}}'.includes('search_location'))
            {
                document.getElementById('div-{{$name}}-street').style.display="none";
                document.getElementById('div-{{$name}}-house').style.display="none";
            } else {


            }

            });





        });
    </script>
@endpush
