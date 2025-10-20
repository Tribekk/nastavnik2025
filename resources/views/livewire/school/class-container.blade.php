<div x-data="{ selectCurator: false }">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title font-weight-bold font-size-h3 text-primary">
                Управление структурными подразделениями
            </div>
            <div class="card-toolbar">
                <button class="btn btn-success px-4 py-2 my-1" data-target="#classModal" data-toggle="modal" wire:click="createClass">
                    <i class="la la-plus"></i> Добавить структурное подразделение
                </button>
            </div>
        </div>

        <div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $class->id ? 'Редактирование структурного подразделения' : 'Новое структурное подразделение' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="font-weight-bold font-size-h3 text-primary">Структурное подразделение</h4>
                        <x-inputs.input-text-v name="class.number" type="text" title="Название подразделения" model="class.number" :required="true"/>
{{--                        <x-inputs.input-text-v name="class.letter" type="text" min="1" title="Буква" model="class.letter"/>--}}
                        <x-inputs.input-text-v name="class.students_count" type="number" step="1" min="1" max="9999" title="Количество сотрудников в отделе" model="class.students_count"/>
                        <x-inputs.input-text-v name="class.year" type="number" step="1" min="1990" title="Год" model="class.year"/>

                        <div class="form-group">
                            <label for="profile_id" class="font-size-h6 font-weight-bolder text-dark required">Функция подразделения</label>
                            <div wire:ignore>
                                <select name="class.profile_id" id="profile_id" style="width: 100%"></select>
                            </div>

                            @error('class.profile_id')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if(!empty($classProfile) && $classProfile->arbitrary_title)
                            <x-inputs.input-text-v name="class.arbitrary_profile_title" type="text" title="Профиль структурного подразделения" model="class.arbitrary_profile_title" :required="true"/>
                        @endif

                        <input type="text" name="school_id" value="{{ $school->id }}" hidden>

                        @if($class->id)
                            @include('admin.schools._edit._class-curators')
                        @endif
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <button type="button" class="btn btn-light-success font-weight-bold mr-2" wire:click="updateOrCreateClass">
                                    Сохранить
                                </button>
                                <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Отмена</button>
                            </div>
                            @if($class->id)

                                <div>
                                    <div>
                                        <a href="{{ route('school.classes.show.table', $class) }}" target="_blank" class="btn btn-outline-success font-weight-bold">Результаты тестирования структурного подразделения</a>
                                        <button type="button" class="btn btn-light-danger font-weight-bold" id="delete-class-button">Удалить</button>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="mt-3 p-2">
                @foreach($classes as $class)
                    <button data-target="#classModal" data-toggle="modal" wire:click="editClass({{$class->id}})" class="btn btn-outline-success mr-3 mb-3">
                        <i class="la la-pencil"></i>{{ $class->number }}{{ $class->letter }} (год: {{ $class->year ?? 'не указан' }})
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function initSelectProfile() {
                $('#profile_id').select2({
                    placeholder: 'Поиск',
                    allowClear: true,
                    language: {
                        noResults: function(){
                            return "Нет результатов";
                        },
                        errorLoading: function(){
                            return "Не удалось загрузить";
                        },
                    },
                    ajax: {
                        url: '/class_profiles',
                        dataType: 'json',
                        data: function (params) {
                            var query = {
                                q: params.term,
                            }
                            return query;
                        },
                        processResults: function (response) {
                            return {
                                results: response.data
                            };
                        }
                    },
                });

                $('#profile_id').off('change');
                $('#profile_id').on('change', function (e) {
                    @this.call('setProfileId', e.target.value);
                });
            }

            window.livewire.on('clearSelectedProfileOptions', _ => {
                $('#profile_id').find('option')
                    .remove();
            });

            window.livewire.on('initSelectedProfile', r => {
                initSelectProfile();

                if(+r) {
                    $.ajax(`/class_profiles/${+r}`)
                        .then(function (response) {
                            var newOption = new Option(response.title, response.id, true, true);
                            $('#profile_id').append(newOption);
                        })
                }
            });

            @this.on('hide-modal', _ => {
                $('#classModal').modal('hide')
            });

            @this.on('start-edit-class', _ => {
                $('#delete-class-button').off('click');
                $('#delete-class-button').on('click', onDeleteClass);

                function onDeleteClass(e) {
                    e.preventDefault();
                    let res = confirm('Вы действительно хотите удалить запись?');
                    if(res) {
                    @this.call('deleteClass');
                    }
                }

                const select = $('#curator_id');

                select.select2({
                    placeholder: '{{ __('Выберите руководителя') }}',
                    ajax: {
                        url: '/admin/users/teachers',
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
                                `${row.first_name} ${row.last_name} ${row.school ? ', ' + row.school.title : ''}`
                            );

                            return {
                                results: response.data
                            };
                        }
                    }
                });

                select.on('change', function (e) {
                    @this.set('curatorId', e.target.value);
                });
            });

            @this.on('remove-curator', $id => {
                Swal.fire({
                    title: 'Вы действительно хотите удалить куратора?',
                    showCancelButton: true,
                    confirmButtonColor: 'var(--success)',
                    cancelButtonColor: 'var(--primary)',
                    confirmButtonText: 'Удалить',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.value) {
                        @this.call('removeCurator', $id);
                    }
                });
            });
        });
    </script>
@endpush
