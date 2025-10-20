@push('css')
    <style type="text/css">
        .st0{fill:#5C6670;}
    </style>
@endpush

<div class="col-xl-12">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            @include('home._widgets.attach-role._form')


            <div class="mt-8 text-right">
                <a href="{{ route('attach.consultant') }}" class="font-hero font-brown-light link font-size-h5 mx-4">Консультант</a>
{{--                <a href="{{ route('attach.employer') }}" class="font-hero font-brown-light link font-size-h5 mx-4">Работодатель</a>--}}
            </div>
        </div>
    </div>
</div>
