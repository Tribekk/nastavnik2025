<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Создание нового профиля на основе существующего']); ?>
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
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новый Профиль на основе существующего
                        </div>
                    </div>
                    <div class="card-body">

                        <?php echo $__env->make('admin.user_profiles.include.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <form action="<?php echo e(route('user_profiles.store_by_exists')); ?>" method="POST" >
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Использовать профиль:</strong>

                            <select name="profile_exists_id" style="width:250px;height:30px">

                                <?php $__currentLoopData = $user_profiles->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user_profile->id); ?>"><?php echo e($user_profile->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                    </div>
                </div>


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Название профиля:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Название профиля" value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                            </div>





                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <table>
                        <tr><td>
                    <button type="submit" class="btn btn-primary" style="background-color:#38957B">Создать новый профиль на основ указанного</button>
                            </td><td width="5"></td><td>
                    <a href="<?php echo e(route('user_profiles.index')); ?>">
                        <div style="border-radius:5px;padding:5px;background-color:#DBD6DB"><?php echo e(__(' Отмена')); ?></div>
                    </a></td>
                        </tr>
                    </table>
                </div>


            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/add_by_exists.blade.php ENDPATH**/ ?>