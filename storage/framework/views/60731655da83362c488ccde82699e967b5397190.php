<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Профтрекер']); ?>
<?php $component->withName('subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'font-pixel text-uppercase text-center text-white']); ?> <?php if (isset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b)): ?>
<?php $component = $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b; ?>
<?php unset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="font-size-h2 font-weight-bold text-primary">Обратная связь</h3>
                <h3 class="font-size-h3 text-primary">Пожалуйста, дайте Вашу оценку по этапам реализации проекта</h3>

                <form action="<?php echo e(route('feedback.store')); ?>" method="post" class="mt-10">
                    <?php echo csrf_field(); ?>

                     <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'events_attached_earlier','name' => 'events_attached_earlier','title' => '1. В каких мероприятиях для наставников вы участвовали ранее?','placeholder' => 'Напишите']); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">2. Оцените эффективность Профтрекера в сравнении с прошлыми проектами?</label>
                        <div class="">
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective1" name="effective" value="1" <?php if(old('effective') === '1'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> прошлые более эффективны
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective2" name="effective" value="2" <?php if(old('effective') === '2'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> примерно одинаково
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective3" name="effective" value="3" <?php if(old('effective') === '3'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> Профтрекер понравился больше
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective4" name="effective" value="4" <?php if(old('effective') === '4'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> пока затрудняюсь ответить
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">3. Как вы бы охарактеризовали проект Профтрекер</label>
                        <?php echo $__env->make('feedback._slider-input', ['leftLabel' => 'непонятный', 'rightLabel' => 'понятный', 'sliderId' => 'intelligibility', 'sliderName' => 'intelligibility', 'sliderClass' => 'progress-alla', 'value' => old('intelligibility', 5)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('feedback._slider-input', ['leftLabel' => 'скучный', 'rightLabel' => 'интересный', 'sliderId' => 'interesting', 'sliderName' => 'interesting', 'sliderClass' => 'progress-warning', 'value' => old('interesting', 5)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('feedback._slider-input', ['leftLabel' => 'непроработанный', 'rightLabel' => 'качественный', 'sliderId' => 'elaboration', 'sliderName' => 'elaboration', 'sliderClass' => 'progress-blue', 'value' => old('elaboration', 5)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('feedback._slider-input', ['leftLabel' => 'неинформативный', 'rightLabel' => 'полезный', 'sliderId' => 'utility', 'sliderName' => 'utility', 'sliderClass' => 'progress-alla', 'value' => old('utility', 5)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="mt-4">
                             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'project_definition','name' => 'project_definition','title' => 'Ваше определение проекта']); ?>
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

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark required">4. Какую оценку поставите проекту в целом</label>
                        <div class="radio-inline flex-wrap">
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark1" name="mark" value="1" <?php if(old('mark') === '1'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 1
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark2" name="mark" value="2" <?php if(old('mark') === '2'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 2
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark3" name="mark" value="3" <?php if(old('mark') === '3'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 3
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark4" name="mark" value="4" <?php if(old('mark') === '4'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 4
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark5" name="mark" value="5" <?php if(old('mark') === '5'): ?> checked <?php endif; ?>>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 5
                            </label>
                        </div>

                        <?php $__errorArgs = ['mark'];
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
                        <label class="font-size-h6 font-weight-bolder text-dark required">5. Ваши эмоции, состояние, настроение по итогам реализации этапа</label>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('feedback.mark-emotions', ['id' => 'emotion','name' => 'emotion','value' => ''.e(old('emotion')).''])->html();
} elseif ($_instance->childHasBeenRendered('Oj2RwFB')) {
    $componentId = $_instance->getRenderedChildComponentId('Oj2RwFB');
    $componentTag = $_instance->getRenderedChildComponentTagName('Oj2RwFB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Oj2RwFB');
} else {
    $response = \Livewire\Livewire::mount('feedback.mark-emotions', ['id' => 'emotion','name' => 'emotion','value' => ''.e(old('emotion')).'']);
    $html = $response->html();
    $_instance->logRenderedChild('Oj2RwFB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:feedback.mark-emotions>

                        <?php $__errorArgs = ['emotion'];
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


                     <?php if (isset($component)) { $__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\TextArea::class, ['name' => 'comment','id' => 'comment','title' => '6. Комментарий']); ?>
<?php $component->withName('inputs.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Текст комментария']); ?> <?php if (isset($__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842)): ?>
<?php $component = $__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842; ?>
<?php unset($__componentOriginal92dd43559e887c5eb812495f8cc84efb27f8e842); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                    <div class="button-group">
                        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-primary rounded-pill px-8 mx-sm-2 my-2 font-size-h5 w-100 w-sm-auto">Назад / На главную</a>
                        <button class="btn btn-primary rounded-pill px-8 mx-sm-2 my-2 font-size-h5 w-100 w-sm-auto">Отправить отзыв</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        /* progress blue */
        .progress-blue .irs--flat .irs-bar,
        .progress-blue .irs--flat .irs-from,
        .progress-blue .irs--flat .irs-to,
        .progress-blue .irs--flat .irs-single,
        .progress-blue .irs--flat .irs-handle > i:first-child {
            background-color: #385E9D;
        }

        .progress-blue .irs--flat .irs-from:before,
        .progress-blue .irs--flat .irs-to:before,
        .progress-blue .irs--flat .irs-single:before {
            border-top-color: #385E9D;
        }

        /* warning progress */
        .progress-warning .irs--flat .irs-bar,
        .progress-warning .irs--flat .irs-from,
        .progress-warning .irs--flat .irs-to,
        .progress-warning .irs--flat .irs-single,
        .progress-warning .irs--flat .irs-handle > i:first-child {
            background-color: #FFA800;
        }

        .progress-warning .irs--flat .irs-from:before,
        .progress-warning .irs--flat .irs-to:before,
        .progress-warning .irs--flat .irs-single:before {
            border-top-color: #FFA800;
        }

        /* alla progress */
        .progress-alla .irs--flat .irs-bar,
        .progress-alla .irs--flat .irs-from,
        .progress-alla .irs--flat .irs-to,
        .progress-alla .irs--flat .irs-single,
        .progress-alla .irs--flat .irs-handle > i:first-child {
            background-color: #912F46;
        }

        .progress-alla .irs--flat .irs-from:before,
        .progress-alla .irs--flat .irs-to:before,
        .progress-alla .irs--flat .irs-single:before {
            border-top-color: #912F46;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/feedback/form.blade.php ENDPATH**/ ?>