<div class="{{ $classes }}">
    <div class="{{ $schoolClasses }}">
        <label for="school" class="mb-3">Компания</label>
        <livewire:components.select2
            name="school_id" id="school"
            url="{{ route('admin.schools.view') }}"
            event="filterBySchool"
            placeholder="{{__('Компания')}}"
            selected="{{ $schoolId }}"
            selectedItemUrl="/school"
        />
    </div>
    <div class="{{ $classClasses }}">
        <label for="class" class="mb-3">Структурное подразделение</label>
        <div class="{{ $schoolId ? '' : 'select2-disabled' }}">
            <div wire:ignore>
                <select type="text" id="class" style="width: 100%" name="class_id"></select>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .select2-disabled {
            pointer-events: none;
            opacity: .5;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            const initClassSelect2 = (schoolId, classId = null) => {
                initSelect2(
                    'class',
                    'Структурное подразделение',
                    'filterByClass',
                    `/school/${schoolId}/classes`,
                    `/school/${schoolId}/classes`,
                    `${classId ? classId : ''}`,
                    (response) => {
                        let data = response.data;
                        data.forEach(row =>
                            row.text = `${row.number}${row.letter} (${row.year ? row.year : 'не указан'})`
                        );

                        return {
                            results: response.data,
                        }
                    },
                    (response) => new Option(`${response.number}${response.letter} (год: ${response.year ? response.year : 'не указан'})`, response.id, true, true),
                );
            };

            /**
             * Ивенты на обновление полей
             */
            window.livewire.on('filterBySchool', val => @this.call('setSchool', val));
            window.livewire.on('filterByClass', val => @this.call('setClass', val));

            /**
             * Ивены реинизиализации select2
             */
            @this.on('reInitClass', schoolId => initClassSelect2(schoolId));

            initClassSelect2('{{ $schoolId ?? ''  }}', '{{ $classId ?? ''  }}');
        });
    </script>
@endpush
