<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Редактирование критериев']); ?>
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

    <div class="row">
        <div class="col">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                        Редактирование критериев соответствия модели компетенций Наставника, профиля "<?php echo e($userProfile->title); ?>"
                    </div>
                </div>
                <div class="card-body">

                    <div style="width:100%" align="right">
                        <table><tr>

                                <td>
                                    <a href="<?php echo e(route('user_profiles.ankets',$userProfile->id)); ?>">
                                        <div style="border-radius:5px;padding:5px;background-color:#DBD6DB;"><?php echo e(__(' < Предыдущий блок')); ?></div>
                                    </a>

                                </td><td width="5"></td>


                                <td>
                                    <a href="<?php echo e(route('user_profiles.edit',$userProfile->id)); ?>">
                                        <div style="border-radius:5px;padding:5px;background-color:#DBD6DB;"><?php echo e(__(' На главную')); ?></div>
                                    </a>

                                </td><td width="5"></td><td>






                                </td>
                            </tr></table>
                    </div>

                    <?php echo $__env->make('admin.user_profiles.include.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="<?php echo e(route('user_profiles.base_test_items_update',$baseTestItems->first()->id)); ?>" method="POST" >

                        <?php echo csrf_field(); ?>
                        <table>
                            <tr>
                                <td width="40"></td>
                                <td width="90%">

                                    <div class="row">


                                        <div class="col-xs-50 col-sm-50 col-md-50">
                                            <div class="form-group">


                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">№</th>

                                                        <th scope="col">Вопрос</th>
                                                        <th scope="col">Зеленая зона</th>
                                                        <th scope="col">Желтая зона</th>
                                                        <th scope="col" >Красная зона</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>
                                                           1
                                                        </td>
                                                        <td>
                                                            Общие личностные характеристики наставника
                                                        </td>
                                                        <td style="background-color:#38957B">
                                                            <?php
                                                                $type="green"
                                                            ?>
                                                           <?php echo $__env->make('admin.user_profiles.include.base_test_personal_characters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </td>
                                                        <td  style="background-color:#FFC35F">

                                                            <?php
                                                                $type="yellow"
                                                            ?>
                                                            <?php echo $__env->make('admin.user_profiles.include.base_test_personal_characters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                                        </td>

                                                        <td  style="background-color:#FF4F06">

                                                            <?php
                                                                $type="red"
                                                            ?>
                                                            <?php echo $__env->make('admin.user_profiles.include.base_test_personal_characters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            Общее соответствие модели профессиональных характеристик наставника
                                                        </td>
                                                        <td style="background-color:#38957B">
                                                            <?php
                                                                $type="green"
                                                            ?>
                                                        <?php echo $__env->make('admin.user_profiles.include.base_test_profession_interests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        </td>
                                                        <td  style="background-color:#FFC35F">
                                                            <?php
                                                                $type="yellow"
                                                            ?>
                                                            <?php echo $__env->make('admin.user_profiles.include.base_test_profession_interests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </td>

                                                        <td  style="background-color:#FF4F06">
                                                            <?php
                                                                $type="red"
                                                            ?>
                                                            <?php echo $__env->make('admin.user_profiles.include.base_test_profession_interests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>


                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        </table>

                        <div style="width:100%" align="right">
                            <table><tr>

                                    <td>
                                        <a href="<?php echo e(route('user_profiles.ankets',$userProfile->id)); ?>">
                                            <div style="border-radius:5px;padding:5px;background-color:#DBD6DB;"><?php echo e(__(' < Предыдущий блок')); ?></div>
                                        </a>

                                    </td><td width="5"></td>


                                    <td>
                                        <a href="<?php echo e(route('user_profiles.edit',$userProfile->id)); ?>">
                                            <div style="border-radius:5px;padding:5px;background-color:#DBD6DB;"><?php echo e(__(' На главную')); ?></div>
                                        </a>

                                    </td><td width="5"></td><td>


                                        <a href="<?php echo e(route('user_profiles.deep_test_items',$userProfile->id)); ?>">
                                            <div style="border-radius:5px;padding:5px;background-color:#DBD6DB"><?php echo e(__(' Следующий блок >')); ?></div>
                                        </a>

                                    </td>
                                </tr></table>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">

                            <button type="submit" class="btn btn-primary">Сохранить</button>
                             <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('user_profiles.edit',$userProfile->id)).'','title' => ''.e(__(' Назад')).'']); ?>
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
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/base_test_items.blade.php ENDPATH**/ ?>