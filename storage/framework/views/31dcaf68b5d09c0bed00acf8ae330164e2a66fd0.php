<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Создание нового профиля']); ?>
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
                        Новый Профиль
                    </div>
                </div>
                <div class="card-body">


            <?php echo $__env->make('admin.user_profiles.include.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                            <form action="<?php echo e(route('user_profiles.update',$userProfile->id)); ?>" method="POST" >
                                <?php echo method_field('PATCH'); ?>
                <?php echo csrf_field(); ?>
                <table>
                    <tr>
                        <td width="40"></td>
                        <td width="80%">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Название профиля:</strong>
                                        <input type="text" name="title" class="form-control" placeholder="Название профиля" value="<?php echo e(old('title',$userProfile->title)); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td width="200">
                                                    <?php if($anket_items_completeted==false): ?>
                                                         <a href="<?php echo e(route('user_profiles.ankets',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px"><?php echo e(__('Анкета')); ?></button></a><br>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('user_profiles.ankets',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white"><?php echo e(__('Анкета')); ?></button></a><br>

                                                    <?php endif; ?>

                                                        <?php if($base_items_completeted==false): ?>
                                                            <a href="<?php echo e(route('user_profiles.base_test_items',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:50px;margin-top:5px"><?php echo e(__('Вопросы и тесты по модели компетенций')); ?></button></a><br>

                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('user_profiles.base_test_items',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white"><?php echo e(__('Вопросы и тесты по модели компетенций')); ?></button></a><br>

                                                        <?php endif; ?>


                                                        <?php if($deep_test_items_completeted==false): ?>
                                                            <a href="<?php echo e(route('user_profiles.deep_test_items',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px" disabled="disabled"><?php echo e(__('Углубленные тесты')); ?></button></a><br>

                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('user_profiles.deep_test_items',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white" disabled="disabled"><?php echo e(__('Углубленные тесты')); ?></button></a><br>

                                                        <?php endif; ?>



                                                        <?php if($anket_results_completeted==false): ?>
                                                            <a href="<?php echo e(route('user_profiles.anket_results',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;"><?php echo e(__('Соответствие модели компетенций')); ?></button></a><br>

                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('user_profiles.anket_results',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white"><?php echo e(__('Соответствие модели компетенций')); ?></button></a><br>

                                                        <?php endif; ?>


                                                        <?php if($deep_results_completeted==false): ?>
                                                            <a href="<?php echo e(route('user_profiles.deep_test_results',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px" disabled="disabled"><?php echo e(__('Итоговое соответствие наставника')); ?></button></a><br>

                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('user_profiles.deep_test_results',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white" disabled="disabled"><?php echo e(__('Итоговое соответствие наставника')); ?></button></a><br>

                                                        <?php endif; ?>


                                                        <?php if($consult_completeted==false): ?>
                                                            <a href="<?php echo e(route('user_profiles.consult_results',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px" disabled="disabled"><?php echo e(__('Результаты после консультации ')); ?></button></a><br>

                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('user_profiles.consult_results',$userProfile->id)); ?>"><button type="button" class="btn-outline-success" style="border-radius: 5px 5px 5px 5px; width:300px;height:40px;margin-top:5px;background-color:blue;color:white" disabled="disabled"><?php echo e(__('Результаты после консультации')); ?></button></a><br>

                                                        <?php endif; ?>




                                                </td><td width="20"></td><td>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                </table>


                <div class="col-xs-12 col-sm-12 col-md-12 text-left">

                    <table><tr>
                            <td width="130"></td>
                            <td>
                    <button type="submit" class="btn btn-primary" style="background-color:#38957B">Сохранить</button>
                            </form>
                    </td><td width="5"></td>

                        <td>
                            <a href="<?php echo e(route('user_profiles.index')); ?>">
                                <div style="border-radius:5px;padding:5px;background-color:#DBD6DB"><?php echo e(__(' Отмена')); ?></div>
                            </a>

                        </td>
                    <td width="5"></td>




                    <td>
                        <form method="GET" action="<?php echo e(route('user_profiles.create_by_exists')); ?>">

                            <?php echo csrf_field(); ?>

                            <button type="submit" style="border-radius:5px;padding:5px;background-color:#fcfef6">Дублировать Профиль</button>




                        </form>

                    </td>


                    <td width="5"></td>




                    <td>
                    <form method="POST" id="delete_profile_form" action="<?php echo e(route('user_profiles.destroy', $userProfile->id)); ?>">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>

                        <button type="button" onClick="confirm_delete()" style="border-radius:5px;padding:5px;background-color:#fcfef6">Удалить Профиль</button>
                         <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('user_profiles.excel', $userProfile->id)).'','title' => ''.e(__(' Экспорт в Excel')).'']); ?>
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




                    </form>

                    </td>
                    </tr>
                    </table>

                </div>

                <script>
                    function confirm_delete() {
                        if(confirm('Вы уверены что хотите удалить этот профиль?')) {
                            document.getElementById('delete_profile_form').submit();
                        }
                    }
                </script>


        </div>
    </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/edit.blade.php ENDPATH**/ ?>