<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Управление списком организаций']); ?>
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

        <div class="card card-custom">

            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">


                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#common-tab">

                                    <span class="nav-text font-size-lg"><?php echo e(__('Общая информация')); ?></span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#user-tab">

                                    <span class="nav-text font-size-lg">
                                    <?php echo e(__('Пользователь')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link mx-0" data-toggle="tab" href="#location-tab">

                                    <span class="nav-text font-size-lg"><?php echo e(__('Область поиска наставников')); ?></span>
                                </a>
                            </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link mx-0" data-toggle="tab" href="#profiles-tab">

                                <span class="nav-text font-size-lg"><?php echo e(__('Профили')); ?></span>
                            </a>
                        </li>




                    </ul>
                </div>
            </div>

            <div class="card-body px-0">
                <div class="tab-content">

                    <div class="tab-pane show px-7 active" id="common-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">



                                <form action="<?php echo e(route('admin.orgunits.store')); ?>" enctype="multipart/form-data" method="post">
                                    <?php echo csrf_field(); ?>


                                     <?php if (isset($component)) { $__componentOriginalad742a4cec028b79c2b25663b90a82c0d789eb62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Image::class, ['id' => 'logo','name' => 'logo','title' => 'Логотип']); ?>
<?php $component->withName('inputs.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalad742a4cec028b79c2b25663b90a82c0d789eb62)): ?>
<?php $component = $__componentOriginalad742a4cec028b79c2b25663b90a82c0d789eb62; ?>
<?php unset($__componentOriginalad742a4cec028b79c2b25663b90a82c0d789eb62); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                                     <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'title','name' => 'title','required' => true,'title' => 'Полное название']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'short_title','name' => 'short_title','title' => 'Сокращенное название']); ?>
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

                                     <?php if (isset($component)) { $__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Select2::class, ['id' => 'legal_form_id','name' => 'legal_form_id','required' => true,'url' => ''.e(route('admin.orgunits.legal_forms.view')).'','selectedUrl' => '/admin/orgunits/legal_forms','title' => 'Организационно-правовая форма','placeholder' => 'Выбор организационно-правовой формы']); ?>
<?php $component->withName('inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d)): ?>
<?php $component = $__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d; ?>
<?php unset($__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


                                     <?php if (isset($component)) { $__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Address::class, ['id' => 'legal_address','city' => '','name' => 'legal_address','title' => 'Юридический адрес','required' => 'true']); ?>
<?php $component->withName('inputs.address'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8)): ?>
<?php $component = $__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8; ?>
<?php unset($__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                                     <?php if (isset($component)) { $__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Address::class, ['id' => 'fact_address','city' => '','name' => 'fact_address','title' => 'Фактический адрес','required' => 'true']); ?>
<?php $component->withName('inputs.address'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8)): ?>
<?php $component = $__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8; ?>
<?php unset($__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


                                    <input type="text" name="parent_id" id="parent_id" value="<?php echo e(old('parent_id', request('parent_id'))); ?>" hidden>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="user-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">


                                 <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'first_name','name' => 'first_name','required' => true,'title' => 'Имя ответственного']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'first_name','name' => 'last_name','required' => true,'title' => 'Фамилия ответственного']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'first_name','name' => 'middle_name','required' => true,'title' => 'Отчество ответственного']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'birth_date','id' => 'birth_date','readonly' => true,'datePicker' => true,'placeholder' => 'дд.мм.гггг','title' => 'Дата рождения','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['pattern' => '\d*']); ?>
<?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
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
<?php $component->withAttributes(['id' => 'sex_men_parent']); ?> <?php if (isset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d)): ?>
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
<?php $component->withAttributes(['id' => 'sex_women_parent']); ?> <?php if (isset($__componentOriginalab4bcbe6a2a4cfaff319acefea22ad322c47885d)): ?>
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

                                 <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => ''.e(__('Телефон ответственного')).'','type' => 'phone','value' => ''.e(old('phone')).'','placeholder' => '+7 (___) ___ __ __','name' => 'phone','id' => 'phone','prependIcon' => 'la la-phone','required' => true]); ?>
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


                    <div class="tab-pane show px-7" id="location-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                <script>
                                    var search_location=1;
                                    var loaded= [];
                                </script>

                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
                                <?php for($i=1;$i<=10;$i++): ?>


                                    <div id="main_div_location_<?php echo e($i); ?>" style="display:none">

                                      <?php if (isset($component)) { $__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Address::class, ['id' => 'search_location_'.e($i).'','city' => '','name' => 'search_location_'.e($i).'','title' => 'Область поиска наставников №'.e($i).'','required' => 'true']); ?>
<?php $component->withName('inputs.address'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8)): ?>
<?php $component = $__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8; ?>
<?php unset($__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


                                        <br>
                                        <table><tr><td>Компания: </td><td width="5"></td><td>
                                                    <select name="schools_id_<?php echo e($i); ?>" id="schools_id_<?php echo e($i); ?>">

                                                    </select>
                                                </td></tr></table>


                                        <br>
                                        <table><tr><td>Структурное подразделение: </td><td width="5"></td><td>
                                                    <select name="class_id_<?php echo e($i); ?>[]" id="class_id_<?php echo e($i); ?>" multiple="multiple">

                                                    </select>
                                                    <input type="hidden" name="school_value_<?php echo e($i); ?>" id="school_value_<?php echo e($i); ?>" value="">

                                                </td></tr></table>
                                        <br>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#class_id_<?php echo e($i); ?>').select2({
                                                width: '300px',
                                                placeholder: "Выберите структурное подразделение",
                                                allowClear: true
                                            });

                                            $(document).on('change', '#search_location_<?php echo e($i); ?>-city', function () {
                                                console.log('Город изменен');
                                                get_schools(<?php echo e($i); ?>);

                                            });

                                            $(document).on('change', 'select#schools_id_<?php echo e($i); ?>', function () {
                                                console.log('Компания изменена');
                                                get_classes(<?php echo e($i); ?>);
                                            });
                                        });
                                    </script>
                                <?php endfor; ?>


                                <script>
                                    current_location=1;
                                    var loaded= new Map([]);


                                    function get_schools(id,selected_id=0) {
                                        var get_city=document.getElementById('search_location_'+id+'-city').value;

                                        ///отправляем запрос аяксом
                                        $.ajax({
                                            url: '/kladr/schools/' + get_city,
                                            type: "GET" ,
                                            dataType: 'json'
                                        }).done(function(result)  {

                                            ///проверить


                                            var check_str="";
                                            result.forEach(function (item) {
                                                check_str=check_str+item.title;
                                            });


                                            if(loaded.get('schools_id_'+id)!=check_str) {
                                                document.getElementById('school_value_' + id).value = "";
                                                var selectElement = document.getElementById('schools_id_' + id);
                                                selectElement.innerHTML = "";
                                                loaded.set('schools_id_' + id, check_str);

                                                //alert(result);
                                                result.forEach(function (item) {

                                                    if (document.getElementById('school_value_' + id).value === "") {
                                                        document.getElementById('school_value_' + id).value = item.title;
                                                    }

                                                    var option = document.createElement('option');
                                                    option.value = item.id;

                                                    if (item.id === Number(selected_id)) {
                                                        option.selected = true;
                                                    }

                                                    option.text = item.title;
                                                    selectElement.add(option);

                                                });
                                                $('#schools_id_' + id).trigger('change');
                                            }
                                        });

                                    }


                                    function get_classes(id, class_id=[]) {
                                        var school=document.getElementById('schools_id_'+id).value;
                                        if(school !== "") {

                                            ///отправляем запрос аяксом
                                            $.ajax({
                                                url: '/kladr/classes/' + school,
                                                type: "GET",
                                                dataType: 'json'
                                            }).done(function (result) {

                                                ///проверить
                                                var check_str = "";
                                                result.forEach(function (item) {
                                                    check_str = check_str + item.number;
                                                });


                                                var selectElement = document.getElementById('class_id_' + id);
                                                selectElement.innerHTML = "";
                                                loaded.set('class_id_' + id, check_str);
                                                let values_classes_select2 = [];

                                                result.forEach(function (item) {

                                                    var option = document.createElement('option');
                                                    option.value = item.number + item.letter;

                                                    current_class_in_classes = class_id.indexOf((item.number + item.letter))
                                                    if (current_class_in_classes >= 0) {
                                                        option.selected = true;
                                                        values_classes_select2.push(item.number + item.letter);
                                                    }

                                                    option.text = item.number + item.letter;
                                                    selectElement.add(option);

                                                });

                                                $('#class_id_' + id).val(values_classes_select2).trigger('change');
                                            });
                                        }
                                    }









                                    function autoren (item) {
                                        console.log ("Favorit " + item.id+" "+item.text)
                                    }




                                    function addLocation() {
                                        document.getElementById('main_div_location_'+current_location).style.display="block";

                                        current_location=current_location+1;

                                        document.getElementById('current_location').value=current_location;
                                    }


                                    function removeLocation() {

                                        if(current_location>1) {

                                            current_location = current_location - 1;
                                            document.getElementById('main_div_location_' + current_location).style.display = "none";

                                            document.getElementById('current_location').value = current_location;
                                        }
                                    }

                                </script>
                                <input type="hidden" name="current_location" id="current_location" value="1">



                                <input type="button" onClick="addLocation()" value="Добавить область поиска">
                                <input type="button" onClick="removeLocation()" value="Убрать область поиска">

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="profiles-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                 <?php if (isset($component)) { $__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Select2::class, ['id' => 'activity_kind_id','name' => 'activity_kind_id[]','required' => true,'title' => 'Профили работодателя','placeholder' => 'Выбор профиля','event' => 'setActivityKindId','multiple' => true,'value' => ''.e(is_array(old('activity_kind_id')) ? implode(',', old('activity_kind_id')) : '').'','url' => ''.e(route('admin.orgunits.activity_kinds.view')).'','selectedUrl' => '/admin/orgunits/activity_kinds']); ?>
<?php $component->withName('inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d)): ?>
<?php $component = $__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d; ?>
<?php unset($__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


                            </div>
                        </div>
                    </div>




                </div>

                <br>

                <div style="margin-left:25px">

                 <?php if (isset($component)) { $__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Submit::class, ['title' => 'Добавить']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('admin.orgunits.view')).'','title' => ''.e(__('К списку организаций')).'']); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/orgunits/create.blade.php ENDPATH**/ ?>