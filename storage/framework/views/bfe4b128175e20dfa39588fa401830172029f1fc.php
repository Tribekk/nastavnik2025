<div>
    <!-- выбор региона -->
    <div>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'-region','id' => ''.e($name).'-region','url' => ''.e(route('kladr.regions')).'','event' => 'setRegion'.e($name).'','placeholder' => 'Регион','selected' => ''.e($region ?? '').'','selectedItemUrl' => '/kladr/regions'])->html();
} elseif ($_instance->childHasBeenRendered('l669291071-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l669291071-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l669291071-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l669291071-0');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'-region','id' => ''.e($name).'-region','url' => ''.e(route('kladr.regions')).'','event' => 'setRegion'.e($name).'','placeholder' => 'Регион','selected' => ''.e($region ?? '').'','selectedItemUrl' => '/kladr/regions']);
    $html = $response->html();
    $_instance->logRenderedChild('l669291071-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


        <input type="text" name="<?php echo e($name); ?>[region]" value="<?php echo e($region); ?>" hidden>

        <div wire:ignore>
            <?php $__errorArgs = ["{$name}.region"];
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
    </div>


    <!-- выбор города -->
    <div class="mt-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'-city','id' => ''.e($name).'-city','url' => ''.e(route('kladr.cities') . ($region ? '?region='.str_replace('0', '', $region) : '')).'','event' => 'setCity'.e($name).'','placeholder' => 'Город','selected' => ''.e($city ?? '').'','selectedItemUrl' => '/kladr/cities'])->html();
} elseif ($_instance->childHasBeenRendered('l669291071-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l669291071-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l669291071-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l669291071-1');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'-city','id' => ''.e($name).'-city','url' => ''.e(route('kladr.cities') . ($region ? '?region='.str_replace('0', '', $region) : '')).'','event' => 'setCity'.e($name).'','placeholder' => 'Город','selected' => ''.e($city ?? '').'','selectedItemUrl' => '/kladr/cities']);
    $html = $response->html();
    $_instance->logRenderedChild('l669291071-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <input type="text" name="<?php echo e($name); ?>[city]" value="<?php echo e($city); ?>" hidden>

        <div wire:ignore>
            <?php $__errorArgs = ["{$name}.city"];
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
    </div>


    <!-- выбор улицы -->
    <div class="mt-3" id="div-<?php echo e($name); ?>-street" style="display:block">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'-street','id' => ''.e($name).'-street','url' => ''.e(route('kladr.streets')).'','event' => 'setStreet'.e($name).'','placeholder' => 'Улица','selected' => ''.e($street ?? '').'','selectedItemUrl' => '/kladr/streets','style' => 'display:block'])->html();
} elseif ($_instance->childHasBeenRendered('l669291071-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l669291071-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l669291071-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l669291071-2');
} else {
    $response = \Livewire\Livewire::mount('components.select2', ['name' => ''.e($name).'-street','id' => ''.e($name).'-street','url' => ''.e(route('kladr.streets')).'','event' => 'setStreet'.e($name).'','placeholder' => 'Улица','selected' => ''.e($street ?? '').'','selectedItemUrl' => '/kladr/streets','style' => 'display:block']);
    $html = $response->html();
    $_instance->logRenderedChild('l669291071-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <input type="text" name="<?php echo e($name); ?>[street]" value="<?php echo e($street); ?>" hidden>

        <div wire:ignore>
            <?php $__errorArgs = ["{$name}.street"];
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
    </div>

    <div class="mt-3" id="div-<?php echo e($name); ?>-house" style="display:block">

         <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => ''.e($name).'[house]','id' => ''.e($name).'-house','value' => ''.e($house).'','placeholder' => 'Дом']); ?>
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
    </div>




</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {


            if('<?php echo e($name); ?>'.includes('search_location')) {

                document.getElementById('div-<?php echo e($name); ?>-street').style.display="none";
                document.getElementById('div-<?php echo e($name); ?>-house').style.display="none";

            }


            /**
             * Ивенты на обновление полей
             */
            window.livewire.on('setRegion<?php echo e($name); ?>', val => window.livewire.find('<?php echo e($_instance->id); ?>').call('setRegion', val));
            window.livewire.on('setCity<?php echo e($name); ?>', val => window.livewire.find('<?php echo e($_instance->id); ?>').call('setCity', val));
            window.livewire.on('setStreet<?php echo e($name); ?>', val => window.livewire.find('<?php echo e($_instance->id); ?>').call('setStreet', val));

            /**
             * Ивены реинизиализации select2
             */
            window.livewire.find('<?php echo e($_instance->id); ?>').on('reInitCity', _ => {
                const region = (window.livewire.find('<?php echo e($_instance->id); ?>').get('region').toString()).substr(0, 2);
                const city = (window.livewire.find('<?php echo e($_instance->id); ?>').get('city').toString());

                let params = new URLSearchParams();
                if(region) params.append('region', region);

                initSelect2(
                    '<?php echo e($name); ?>-city',
                    'Город',
                    'setCity<?php echo e($name); ?>',
                    `<?php echo e(route('kladr.cities')); ?>?${params.toString()}`,
                    '/kladr/cities',
                    city
                );



            if('<?php echo e($name); ?>'.includes('search_location'))
            {
                document.getElementById('div-<?php echo e($name); ?>-street').style.display="none";
                document.getElementById('div-<?php echo e($name); ?>-house').style.display="none";
            } else {


            }
            });


            window.livewire.find('<?php echo e($_instance->id); ?>').on('reInitStreet', _ => {
                const region = (window.livewire.find('<?php echo e($_instance->id); ?>').get('region').toString()).substr(0, 2);
                const city = (window.livewire.find('<?php echo e($_instance->id); ?>').get('city').toString());

                let params = new URLSearchParams();
                if(region) params.append('region', region);
                if(city) params.append('city', city);


                initSelect2(
                    '<?php echo e($name); ?>-street',
                    'Улица',
                    'setStreet<?php echo e($name); ?>',
                    `<?php echo e(route('kladr.streets')); ?>?${params.toString()}`,
                    '/kladr/streets',
                    ''
                );
            if('<?php echo e($name); ?>'.includes('search_location'))
            {
                document.getElementById('div-<?php echo e($name); ?>-street').style.display="none";
                document.getElementById('div-<?php echo e($name); ?>-house').style.display="none";
            } else {


            }

            });





        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/kladr/select-address.blade.php ENDPATH**/ ?>