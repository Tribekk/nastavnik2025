<div class="d-flex">
    <div class="my-2 mx-2 p-md-3 p-2 cursor-pointer d-flex justify-content-center align-items-center hover-opacity-50 @if($value === 'frown') border-secondary @endif"
         style="border: 2px solid transparent; border-radius: 12px;"
         wire:click="setValue('frown')">
        <i class="las la-frown text-warning" style="font-size: 45px;"></i>
    </div>

    <div class="my-2 mx-2 p-md-3 p-2 cursor-pointer d-flex justify-content-center align-items-center hover-opacity-50 @if($value === 'meh') border-secondary @endif"
         style="border: 2px solid transparent; border-radius: 12px;"
         wire:click="setValue('meh')">
        <i class="las la-meh font-blue" style="font-size: 45px;"></i>
    </div>

    <div class="my-2 mx-2 p-md-3 p-2 cursor-pointer d-flex justify-content-center align-items-center hover-opacity-50 @if($value === 'smile') border-secondary @endif"
         style="border: 2px solid transparent; border-radius: 12px;"
         wire:click="setValue('smile')">
        <i class="las la-smile font-alla" style="font-size: 45px;"></i>
    </div>

    <input type="text" name="{{ $name }}" id="{{ $inputId }}" value="{{ $value }}" hidden>
</div>
