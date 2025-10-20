<div class="tab-pane show px-7 active" id="user-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-3">
            <ul class="navi navi-hover navi-link-rounded">
                <li class="navi-item">
                    <a href="<?php echo e(route('admin.users.login', $user)); ?>" class="navi-link">
                        <span class="navi-icon"><i class="la la-sign-in-alt"></i></span>
                        <span class="navi-text"><?php echo e(__('Вход под пользователем')); ?></span>
                    </a>
                </li>
            </ul>

        </div>
        <div class="col-xl-7 my-2">

            <?php if($errors->any()): ?>
                <div class="alert alert-custom alert-light-danger">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text"><?php echo e($errors->first()); ?></div>
                </div>
            <?php endif; ?>

            <div class="pb-7 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-primary font-size-h4 font-size-h1-lg"><?php echo e($user->fullName); ?></h3>
            </div>

            <?php echo $__env->make('admin.users._edit._avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="form-group row my-2">
                <label class="col-4 col-form-label"><?php echo e(__('Роль')); ?>:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder"><?php echo e($user->rolesAsString); ?></span>
                </div>
            </div>

            <?php if($user->birth_date): ?>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">Дата рождения:</label>
                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder"><?php echo e($user->birthDateFormatted); ?></span>
                    </div>
                </div>
            <?php endif; ?>


            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('users.account', ['user' => $user])->html();
} elseif ($_instance->childHasBeenRendered('OSnyj4j')) {
    $componentId = $_instance->getRenderedChildComponentId('OSnyj4j');
    $componentTag = $_instance->getRenderedChildComponentTagName('OSnyj4j');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OSnyj4j');
} else {
    $response = \Livewire\Livewire::mount('users.account', ['user' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('OSnyj4j', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:users.account>
        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/users/_edit/_user-tab.blade.php ENDPATH**/ ?>