<div class="tab-pane show px-7 active" id="user-tab" role="tabpanel">

    <div class="py-3">
        <?php if($errors->any()): ?>
            <div class="alert alert-custom alert-light-danger">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text"><?php echo e($errors->first()); ?></div>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-7 my-2">
            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg"><?php echo e(__('Данные пользователя')); ?></h3>
            </div>

            <?php echo $__env->make('admin.users._create._avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Фамилия','type' => 'text','value' => ''.e(old('last_name')).'','name' => 'last_name','id' => 'last_name','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Имя','type' => 'text','value' => ''.e(old('first_name')).'','name' => 'first_name','id' => 'first_name','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Отчество','type' => 'text','value' => ''.e(old('middle_name')).'','name' => 'middle_name','id' => 'middle_name']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => ''.e(__('E-mail')).'','type' => 'email','value' => ''.e(old('email')).'','placeholder' => 'Укажите адрес электронной почты','name' => 'email','id' => 'email','prependIcon' => 'la la-at','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
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

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Дата рождения','placeholder' => 'дд.мм.гггг','readonly' => true,'id' => 'birth_date','datePicker' => true,'name' => 'birth_date','value' => ''.e(old('birth_date')).'']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
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

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('school.select-school-class', ['nullableClassId' => true])->html();
} elseif ($_instance->childHasBeenRendered('42zp0ea')) {
    $componentId = $_instance->getRenderedChildComponentId('42zp0ea');
    $componentTag = $_instance->getRenderedChildComponentTagName('42zp0ea');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('42zp0ea');
} else {
    $response = \Livewire\Livewire::mount('school.select-school-class', ['nullableClassId' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('42zp0ea', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:school.select-school-class>

            <div class="form-group">
                <label for="orgunit_id" class="font-size-h6 font-weight-bolder text-dark">Выберите организацию</label>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'orgunit_id','id' => 'orgunit_id','url' => ''.e(route('admin.orgunits.view')).'','event' => 'setOrgunitId','placeholder' => ''.e(__('Выберите организацию')).'','selected' => ''.e(old('orgunit_id') ?? '').'','selectedItemUrl' => '/admin/orgunits'])->html();
} elseif ($_instance->childHasBeenRendered('5rOYlGa')) {
    $componentId = $_instance->getRenderedChildComponentId('5rOYlGa');
    $componentTag = $_instance->getRenderedChildComponentTagName('5rOYlGa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5rOYlGa');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'orgunit_id','id' => 'orgunit_id','url' => ''.e(route('admin.orgunits.view')).'','event' => 'setOrgunitId','placeholder' => ''.e(__('Выберите организацию')).'','selected' => ''.e(old('orgunit_id') ?? '').'','selectedItemUrl' => '/admin/orgunits']);
    $html = $response->html();
    $_instance->logRenderedChild('5rOYlGa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <?php $__errorArgs = ['orgunit_id'];
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

            <div class="pb-8 pt-lg-0 pt-8 mt-12">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg"><?php echo e(__('Пароль от аккаунта')); ?></h3>
            </div>

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Пароль','type' => 'password','name' => 'password','id' => 'password','value' => ''.e(old('password')).'','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => 'Пароль еще раз','type' => 'password','name' => 'password_confirmation','id' => 'password_confirmation','value' => ''.e(old('password_confirmation')).'','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/users/_create/_user-tab.blade.php ENDPATH**/ ?>