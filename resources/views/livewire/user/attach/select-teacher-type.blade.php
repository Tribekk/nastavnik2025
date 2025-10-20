<div class="form-group">
{{--    <label for="role_type" class="text-dark text-md-right font-size-h4 required">Выберите роль:</label>--}}
    <div class="max-w-md-550px">
        <div class="row mt-3">
            <div class="col-sm-6 text-center position-relative cursor-pointer" wire:click="setRole('curator')">
                <img src="{{ asset('img/curator.jpg') }}" class="img-fluid" alt="HR">
                <span class="nav-text font-size-lg font-weight-bolder text-center">
{{--                <span class="label label-lg label-pill label-inline d-flex flex-column py-2 h-auto font-hero font-size-h4 text-uppercase text-center {{ $role == "curator" ? 'bg-orange' : 'bg-silver' }} text-white">--}}
{{--                    {{ __('Я куратор') }}--}}
{{--                    <span class="font-size-base">от компании</span>--}}
{{--                </span>--}}
            </span>
            </div>
{{--            <div class="col-sm-6 text-center position-relative cursor-pointer" wire:click="setRole('teacher')">--}}
{{--                <img src="{{ asset('img/hr.png') }}" class="img-fluid" alt="HR">--}}
{{--                <span class="nav-text font-size-lg font-weight-bolder text-center">--}}
{{--                <span class="label label-lg label-pill label-inline d-flex flex-column py-2 h-auto font-hero font-size-h4 text-uppercase text-center {{ $role == "teacher" ? 'bg-orange' : 'bg-silver' }} text-white">--}}
{{--                    {{ __('Я HR') }}--}}
{{--                    <span class="font-size-base">руководитель структурного подразделения</span>--}}
{{--                </span>--}}
{{--            </span>--}}
{{--            </div>--}}
        </div>
    </div>
    <input type="text" name="role" value="curator" hidden>
</div>
