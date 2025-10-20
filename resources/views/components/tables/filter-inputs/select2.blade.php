<div class="my-3 {{ $classes }}">
    <label for="{{ $id }}" class="mb-3 @if($value) text-success @endif">{{ $label }}</label>
    <livewire:components.select2
        id="{{ $id }}"
        name="{{ $name }}"
        url="{{ $indexUrl }}"
        event="{{ $event }}"
        placeholder="{{ $placeholder ?? 'Поиск' }} "
        selected="{{ $value }}"
        selectedItemUrl="{{ $showUrl }}"
        multiple="{{ $multiple }}"
    />
</div>
