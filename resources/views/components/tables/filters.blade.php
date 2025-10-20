<div class="card card-custom gutter-b">
    <div class="card-body">
        <form id="form_table_1">
            <h5 class="font-weight-bold">{{ __('Фильтры') }}</h5>

            <div class="row mt-md-5 align-items-end">
                {{ $slot }}

                @unless($withoutActions)
                    <div class="col-md-auto col-12 my-3">
                        <x-inputs.submit title="{{ __('Искать') }}" size="min-w-90px"/>
                        @isset($clearHref)
                            <x-inputs.button-link link="{!! $clearHref !!}" title="{{ __('Сбросить') }}" size="min-w-90px" type="btn-outline-success"/>
                        @endisset
                    </div>
                @endunless
            </div>
        </form>
    </div>
</div>
