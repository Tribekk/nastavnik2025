<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Мои структурные подразделения']); ?>
<?php $component->withName('subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b)): ?>
<?php $component = $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b; ?>
<?php unset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="mt-3 d-flex flex-wrap">
                        <div class="flex-grow-1">
                            <h2 class="font-size-h2 font-weight-bold text-break"><?php echo e($class->school->short_title ?? '-'); ?>. Структурное подразделение <?php echo e($class->number); ?><?php echo e($class->letter); ?> (год: <?php echo e($class->year ? $class->year : 'не указан'); ?>)</h2>
                        </div>
                        <div class="w-md-325px w-100 justify-content-md-end d-flex mt-4 mt-md-0 mb-4 mb-md-0">
                            <?php if(Auth::user()->isTeacher || Auth::user()->isCurator): ?>
                                <a href="<?php echo e(route('school.classes.list')); ?>" class="btn btn-success"><i class="la la-reply"></i>К списку структурных подразделений</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br>

                    <h3>Добавление ребенка</h3><br>
                    <form class="form" method="POST" action="<?php echo e(route('school.classes.add_student_with_parent_store')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="class_id" value="<?php echo e($class->id); ?>">

                         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'last_name','title' => 'Фамилия ребенка','required' => true]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'first_name','title' => 'Имя ребенка','required' => true]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'middle_name','title' => 'Отчество ребенка']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'birth_date','id' => 'birth_date','readonly' => true,'datePicker' => true,'placeholder' => 'дд.мм.гггг','title' => 'Дата рождения','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['pattern' => '\d*']); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                         <?php if (isset($component)) { $__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\RadioGroup::class, ['title' => 'Пол','name' => 'sex']); ?>
<?php $component->withName('inputs.radio-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                             <?php if (isset($component)) { $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Radio::class, ['title' => 'Мужской','value' => '1','name' => 'sex','checked' => true]); ?>
<?php $component->withName('inputs.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'sex_men']); ?> <?php if (isset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d)): ?>
<?php $component = $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d; ?>
<?php unset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                             <?php if (isset($component)) { $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Radio::class, ['title' => 'Женский','value' => '2','name' => 'sex']); ?>
<?php $component->withName('inputs.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'sex_women']); ?> <?php if (isset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d)): ?>
<?php $component = $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d; ?>
<?php unset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916)): ?>
<?php $component = $__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916; ?>
<?php unset($__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => ''.e(__('Телефон')).'','type' => 'tel','value' => ''.e(old('phone')).'','placeholder' => '+7 (___) ___ __ __','name' => 'phone','id' => 'phone','prependIcon' => 'la la-phone','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                        <br>
                        <h3>Добавление родителя</h3><br>

                             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'last_name_parent','title' => 'Фамилия родителя','required' => true]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'first_name_parent','title' => 'Имя родителя','required' => true]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'middle_name_parent','title' => 'Отчество родителя']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'birth_date_parent','id' => 'birth_date_parent','readonly' => true,'datePicker' => true,'placeholder' => 'дд.мм.гггг','title' => 'Дата рождения','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['pattern' => '\d*']); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                             <?php if (isset($component)) { $__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\RadioGroup::class, ['title' => 'Пол','name' => 'sex_parent']); ?>
<?php $component->withName('inputs.radio-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                                 <?php if (isset($component)) { $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Radio::class, ['title' => 'Мужской','value' => '1','name' => 'sex','checked' => true]); ?>
<?php $component->withName('inputs.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'sex_men_parent']); ?> <?php if (isset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d)): ?>
<?php $component = $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d; ?>
<?php unset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                 <?php if (isset($component)) { $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Radio::class, ['title' => 'Женский','value' => '2','name' => 'sex']); ?>
<?php $component->withName('inputs.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'sex_women_parent']); ?> <?php if (isset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d)): ?>
<?php $component = $__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d; ?>
<?php unset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                             <?php if (isset($__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916)): ?>
<?php $component = $__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916; ?>
<?php unset($__componentOriginalda88303f0f5f6c269f2b54b0781858a9cc3c9916); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => ''.e(__('Телефон')).'','type' => 'tel','value' => ''.e(old('phone')).'','placeholder' => '+7 (___) ___ __ __','name' => 'phone_parent','id' => 'phone_parent','prependIcon' => 'la la-phone','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 




                            <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-4 ml-3 mr-3">
                            <?php echo e(__('Создать')); ?>

                        </button>
                    </form>
                </div>



            </div>

        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function() {
                $("#phone").inputmask("+7 (999) 999 99 99");
                $("#phone_parent").inputmask("+7 (999) 999 99 99");
            })
        </script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/school/classes/add_student_with_parent.blade.php ENDPATH**/ ?>