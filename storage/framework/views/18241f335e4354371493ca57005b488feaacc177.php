<div class="pb-5" data-wizard-type="step-content" <?php if($step == "last"): ?> data-wizard-state="current" <?php endif; ?>>
    <h2 class="font-size-h2  font-alla font-pixel mb-5">
        Выберите формат консультации
    </h2>

    <div class="form-group mb-8">
        <label class="font-weight-bold font-size-h5">Какой способ связи предпочитаете - где удобнее получить консультацию?</label>

        <div class="radio-list">
            <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="radio" wire:model="way_of_communication" value="zoom" name="way_of_communication"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                Zoom (можно без установки приложения, через браузер)
            </label>
            <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="radio" wire:model="way_of_communication" value="whatsapp" name="way_of_communication"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                WhatsApp
            </label>
            <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="radio" wire:model="way_of_communication" value="skype" name="way_of_communication"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                Skype
            </label>
            <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="radio" wire:model="way_of_communication" value="irrelevant" name="way_of_communication"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                Не имеет значения
            </label>
        </div>
    </div>

    <div class="form-group mb-8">
        <label class="font-weight-bold font-size-h5">Как бы Вы хотели получить консультацию:</label>

        <div class="checkbox-list">
            <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="checkbox" wire:model="with_child" name="with_child"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                Всю встречу провести с ребенком – не разделять на индивидуальные беседы
            </label>
            <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="checkbox" wire:model="personal_communication_parent" name="personal_communication_parent"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                Выделить из консультации 15-30 минут на личное общение с профориентологом
            </label>
            <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="checkbox" wire:model="personal_communication_child" name="personal_communication_child"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                Дать возможность личного общения ребенку с профориентологом – 30 минут
            </label>
            <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                <input type="checkbox" wire:model="separation_during_consultation" name="separation_during_consultation"/>
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                Определить необходимость любого разделения во время консультации
            </label>
        </div>
    </div>

     <?php if (isset($component)) { $__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\TextArea::class, ['title' => 'Есть ли у Вас какие-то пожелания или вопросы до консультации?','model' => 'wishes_and_questions','name' => 'wishes_and_questions','id' => 'wishes_and_questions']); ?>
<?php $component->withName('inputs.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842)): ?>
<?php $component = $__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842; ?>
<?php unset($__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/consultations/_record-form/last-step.blade.php ENDPATH**/ ?>