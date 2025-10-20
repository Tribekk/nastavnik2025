<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Создание новых профилей']); ?>
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

            <?php echo $__env->make('admin.user_profiles.include.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php if (isset($component)) { $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Card::class, []); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('title'); ?> <?php echo e(__('Профили')); ?> <?php $__env->endSlot(); ?>
             <?php $__env->slot('toolbar'); ?> 
                 <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('user_profiles.create')).'','title' => ''.e(__('Новый Профиль')).'','icon' => 'la-plus']); ?>
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
                 <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('user_profiles.create_by_exists')).'','title' => ''.e(__('Новый Профиль на основе существующего')).'','icon' => 'la-plus']); ?>
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
             <?php $__env->endSlot(); ?>
             <?php if (isset($component)) { $__componentOriginalf1e0a8c207cd542db3d03d9e094fc40eeb15eaa8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Status::class, []); ?>
<?php $component->withName('tables.status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf1e0a8c207cd542db3d03d9e094fc40eeb15eaa8)): ?>
<?php $component = $__componentOriginalf1e0a8c207cd542db3d03d9e094fc40eeb15eaa8; ?>
<?php unset($__componentOriginalf1e0a8c207cd542db3d03d9e094fc40eeb15eaa8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

     <table class="table table-bordered table-striped">
         <thead>
         <tr>
             <th scope="col">№</th>

             <th scope="col">Название профиля</th>
             <th scope="col">Готовность профиля</th>
             <th scope="col"></th>
         </tr>
         </thead>
         <tbody>
         <?php $__currentLoopData = $userProfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

             <tr>
                 <td>
                     <?php echo e($loop->iteration); ?>

                 </td>
                 <td>
                   <?php echo e($profile->title); ?>

                 </td>
                 <td>
                     <?php if($profile->is_completed): ?>
                         <font color="green"> <?php echo e(__('Заполнен')); ?></font>
                     <?php else: ?>
                         <font color="red"> <?php echo e(__('Не заполнен')); ?></font>
                     <?php endif; ?>
                 </td>
                 <td>
                      <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('user_profiles.edit',$profile->id)).'','title' => ''.e(__('Редактировать профиль')).'']); ?>
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
                 </td>
             </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
     </table>


          <?php if (isset($component)) { $__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Pagination::class, ['items' => $userProfiles]); ?>
<?php $component->withName('tables.pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10)): ?>
<?php $component = $__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10; ?>
<?php unset($__componentOriginalfcca607ad7936d2347c3be99680813ee86b63c10); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
  <?php if (isset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8)): ?>
<?php $component = $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8; ?>
<?php unset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    
    <div class="card card-custom gutter-b">
 
        
    </div>


        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/index.blade.php ENDPATH**/ ?>