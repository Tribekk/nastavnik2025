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
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e($class->id ? 'Редактирование структурного подразделения' : 'Новое структурное подразделение'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="font-weight-bold font-size-h3 text-primary">Структурное подразделение</h4>
                         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'class.number','type' => 'text','title' => 'Название подразделения','model' => 'class.number','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'class.students_count','type' => 'number','step' => '1','min' => '1','title' => 'Количество сотрудников в отделе','model' => 'class.students_count']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['max' => '9999']); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'class.year','type' => 'number','step' => '1','min' => '1990','title' => 'Год','model' => 'class.year']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                        <div class="form-group">
                            <label for="profile_id" class="font-size-h6 font-weight-bolder text-dark required">Функция подразделения</label>
                            <div wire:ignore>
                                <select name="class.profile_id" id="profile_id" style="width: 100%"></select>
                            </div>

                            <?php $__errorArgs = ['class.profile_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <?php if(!empty($classProfile) && $classProfile->arbitrary_title): ?>
                             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'class.arbitrary_profile_title','type' => 'text','title' => 'Профиль структурного подразделения','model' => 'class.arbitrary_profile_title','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        <?php endif; ?>

                        <input type="text" name="school_id" value="<?php echo e($school->id); ?>" hidden>

                        <?php if($class->id): ?>
                            <?php echo $__env->make('admin.schools._edit._class-curators', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <button type="button" class="btn btn-light-success font-weight-bold mr-2" wire:click="updateOrCreateClass">
                                    Сохранить
                                </button>
                                <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Отмена</button>
                            </div>
                            <?php if($class->id): ?>

                                <div>
                                    <div>
                                        <a href="<?php echo e(route('school.classes.show.table', $class)); ?>" target="_blank" class="btn btn-outline-success font-weight-bold">Результаты тестирования структурного подразделения</a>
                                        <button type="button" class="btn btn-light-danger font-weight-bold" id="delete-class-button">Удалить</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="mt-3 p-2">
                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button data-target="#classModal" data-toggle="modal" wire:click="editClass(<?php echo e($class->id); ?>)" class="btn btn-outline-success mr-3 mb-3">
                        <i class="la la-pencil"></i><?php echo e($class->number); ?><?php echo e($class->letter); ?> (год: <?php echo e($class->year ?? 'не указан'); ?>)
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
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
                    window.livewire.find('<?php echo e($_instance->id); ?>').call('setProfileId', e.target.value);
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

            window.livewire.find('<?php echo e($_instance->id); ?>').on('hide-modal', _ => {
                $('#classModal').modal('hide')
            });

            window.livewire.find('<?php echo e($_instance->id); ?>').on('start-edit-class', _ => {
                $('#delete-class-button').off('click');
                $('#delete-class-button').on('click', onDeleteClass);

                function onDeleteClass(e) {
                    e.preventDefault();
                    let res = confirm('Вы действительно хотите удалить запись?');
                    if(res) {
                    window.livewire.find('<?php echo e($_instance->id); ?>').call('deleteClass');
                    }
                }

                const select = $('#curator_id');

                select.select2({
                    placeholder: '<?php echo e(__('Выберите руководителя')); ?>',
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
                    window.livewire.find('<?php echo e($_instance->id); ?>').set('curatorId', e.target.value);
                });
            });

            window.livewire.find('<?php echo e($_instance->id); ?>').on('remove-curator', $id => {
                Swal.fire({
                    title: 'Вы действительно хотите удалить куратора?',
                    showCancelButton: true,
                    confirmButtonColor: 'var(--success)',
                    cancelButtonColor: 'var(--primary)',
                    confirmButtonText: 'Удалить',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.value) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').call('removeCurator', $id);
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/school/class-container.blade.php ENDPATH**/ ?>