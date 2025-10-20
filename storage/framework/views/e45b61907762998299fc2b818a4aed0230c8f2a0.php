<div class="tab-pane active show px-7" id="school-tab" role="tabpanel">
    <div class="row">
        <div class="col-md-8">
            <form action="<?php echo e(route('admin.schools.update', $school)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>

                 <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'title','required' => true,'title' => 'Полное название','value' => ''.e(old('title', $school->title)).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'short_title','required' => true,'title' => 'Сокращенное название','value' => ''.e(old('short_title', $school->short_title)).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'address','title' => 'Адрес','value' => ''.e(old('address', $school->address)).'']); ?>
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

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['id' => 'local','name' => 'local','required' => 'true','url' => ''.e(route('kladr.cities')).'','event' => 'filterByParent','placeholder' => 'Город ','selected' => ''.e(old('kladr', $school->local)).'','selectedItemUrl' => '/kladr/cities'])->html();
} elseif ($_instance->childHasBeenRendered('GSDDwjj')) {
    $componentId = $_instance->getRenderedChildComponentId('GSDDwjj');
    $componentTag = $_instance->getRenderedChildComponentTagName('GSDDwjj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GSDDwjj');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['id' => 'local','name' => 'local','required' => 'true','url' => ''.e(route('kladr.cities')).'','event' => 'filterByParent','placeholder' => 'Город ','selected' => ''.e(old('kladr', $school->local)).'','selectedItemUrl' => '/kladr/cities']);
    $html = $response->html();
    $_instance->logRenderedChild('GSDDwjj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>



                 <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'number','required' => true,'title' => 'Основание взаимодействия /  Номер договора','value' => ''.e(old('number', $school->number)).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'director','title' => 'ФИО директора','value' => ''.e(old('director', $school->director)).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'phone','id' => 'phone','title' => 'Контактный номер','prependIcon' => 'la la-phone','value' => ''.e(old('phone', $school->phone)).'','placeholder' => '+7 (___) ___ __ __']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'email','title' => 'Электронная почта','prependIcon' => 'la la-at','value' => ''.e(old('email', $school->email)).'']); ?>
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
                    <label for="type_of_educational_organization" class="font-size-h6 font-weight-bolder text-dark required">Отрасль деятельности компании</label>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'type_of_educational_organization_id','id' => 'type_of_educational_organization','url' => ''.e(route('admin.types_of_educational_organization.view')).'','event' => 'setTypeEducationalOrganization','placeholder' => ''.e(__('Укажите отрасль деятельности компании')).'','selected' => ''.e(old('type_of_educational_organization_id', $school->type_of_educational_organization_id)).'','selectedItemUrl' => '/admin/types_of_educational_organization'])->html();
} elseif ($_instance->childHasBeenRendered('bsI55ep')) {
    $componentId = $_instance->getRenderedChildComponentId('bsI55ep');
    $componentTag = $_instance->getRenderedChildComponentTagName('bsI55ep');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bsI55ep');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'type_of_educational_organization_id','id' => 'type_of_educational_organization','url' => ''.e(route('admin.types_of_educational_organization.view')).'','event' => 'setTypeEducationalOrganization','placeholder' => ''.e(__('Укажите отрасль деятельности компании')).'','selected' => ''.e(old('type_of_educational_organization_id', $school->type_of_educational_organization_id)).'','selectedItemUrl' => '/admin/types_of_educational_organization']);
    $html = $response->html();
    $_instance->logRenderedChild('bsI55ep', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    <?php $__errorArgs = ['type_of_educational_organization_id'];
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

                <div class="form-group">
                    <label for="loyalty_level" class="font-size-h6 font-weight-bolder text-dark">Уровень лояльности</label>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => 'loyalty_level_id','id' => 'loyalty_level','url' => ''.e(route('admin.loyalty_levels.view')).'','event' => 'setLoyaltyLevel','placeholder' => ''.e(__('Укажите уровень лояльности компании')).'','selected' => ''.e(old('loyalty_level_id', $school->loyalty_level_id)).'','selectedItemUrl' => '/admin/loyalty_levels'])->html();
} elseif ($_instance->childHasBeenRendered('TGqCaRY')) {
    $componentId = $_instance->getRenderedChildComponentId('TGqCaRY');
    $componentTag = $_instance->getRenderedChildComponentTagName('TGqCaRY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TGqCaRY');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => 'loyalty_level_id','id' => 'loyalty_level','url' => ''.e(route('admin.loyalty_levels.view')).'','event' => 'setLoyaltyLevel','placeholder' => ''.e(__('Укажите уровень лояльности компании')).'','selected' => ''.e(old('loyalty_level_id', $school->loyalty_level_id)).'','selectedItemUrl' => '/admin/loyalty_levels']);
    $html = $response->html();
    $_instance->logRenderedChild('TGqCaRY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    <?php $__errorArgs = ['loyalty_level_id'];
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

                 <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'token','title' => 'Ключ регистрации','prependIcon' => 'la la-key','value' => ''.e($school->token).'','readonly' => true]); ?>
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

                <div class="d-flex">
                     <?php if (isset($component)) { $__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Submit::class, ['title' => 'Обновить']); ?>
<?php $component->withName('inputs.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a)): ?>
<?php $component = $__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a; ?>
<?php unset($__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                     <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('admin.schools.view')).'','title' => ''.e(__('К списку компаний')).'']); ?>
<?php $component->withName('inputs.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f)): ?>
<?php $component = $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f; ?>
<?php unset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                </div>
            </form>
        </div>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $("#phone").inputmask("+7 (999) 999 99 99");
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/schools/_edit/_school-tab.blade.php ENDPATH**/ ?>