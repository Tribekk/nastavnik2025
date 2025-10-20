<div>
    <div class="form-group">
        <label for="school_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите компанию</label>
        <livewire:components.select2
            name="school_id" id="school_id"
            url="{{ route('admin.schools.view') }}"
            event="setSchoolId"
            placeholder="{{ __('Выберите компанию') }}"
            selected="{{ $schoolId }}"
            selectedItemUrl="/school"
        />

        @error('school_id')
            <span class="invalid-feedback" role="alert" style="display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="class_id" class="font-size-h6 font-weight-bolder text-dark {{ $nullableClassId ? "" : "required" }}">Выберите структурное подразделение</label>
        <select name="class_id" id="class_id" style="width: 100%;"></select>

        @error('class_id')
            <span wire:ignore class="invalid-feedback" role="alert" style="display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function initClass(schoolId) {
                $('#class_id').select2({
                    placeholder: '{{ __('Выберите структурное подразделение') }}',
                    language: {
                        noResults: function(){
                            return "Нет результатов";
                        },
                        errorLoading: function(){
                            return "Не удалось загрузить";
                        },
                    },
                    ajax: {
                        url: `/school/${schoolId}/classes`,
                        dataType: 'json',
                        data: function (params) {
                            var query = {
                                q: params.term,
                            }
                            return query;
                        },
                        processResults: function (response) {
                            let data = response.data;
                            data.forEach(row => row.text =
                                `${row.number}${row.letter} (${row.year ? row.year : 'не указан'})`
                            );

                            return {
                                results: response.data
                            };
                        }
                    }
                });

                $('#class_id').off('change');
                $('#class_id').on('change', function (e) {
                    window.livewire.emit('setClassId', e.target.value)
                });
            }

            initClass();

            window.livewire.on('setSchoolId', r => {
                @this.call("setSchool", r);
            });

            window.livewire.on('initSelectClass', r => {
                setTimeout(() => initClass(+r), 250);
            });

            @if($classId)
                window.livewire.on('initSelectedClass', r => {
                    $.ajax(`/school/class/${+r}/json`)
                        .then(function (response) {
                            const title = `${response.number}${response.letter} (год: ${response.year ? response.year : 'не указан'})`;
                            var newOption = new Option(title, response.id, true, true);
                            $('#class_id').append(newOption);
                        })
                });
            @endif
        });
    </script>
@endpush

