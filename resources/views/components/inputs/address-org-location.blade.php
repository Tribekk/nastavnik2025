<div class="form-group">
    @if($title)
        <label for="{{ $id }}" class="font-size-h6 font-weight-bolder text-dark @if($required) required @endif">{{ $title }}</label>
    @endif

    <livewire:kladr.select-org-address name="{{ $name }}"
                                   region="{{ $region }}"
                                   city="{{ $city }}"
                                   />
</div>

