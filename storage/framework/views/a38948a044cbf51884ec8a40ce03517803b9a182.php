<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Работодатель   '.e($orgunit->title).'']); ?>
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


                    <div class="card-title font-weight-bold font-size-h3 font-hero-super">

                    </div>
                    <div class="card-toolbar">

                    </div>
                    <br>



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

                        <li class="nav-item mr-3">
                            <a class="nav-link mx-0" data-toggle="tab" href="#quiz-tab">

                                <span class="nav-text font-size-lg"><?php echo e(__('Квиз организации')); ?></span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link mx-0" data-toggle="tab" href="#landing-tab">

                                <span class="nav-text font-size-lg"><?php echo e(__('Выбор лендинга')); ?></span>
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



                                <form action="<?php echo e(route('admin.orgunits.update', $orgunit)); ?>" enctype="multipart/form-data" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>

                                    <?php $__errorArgs = ['destroy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                     <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e($message).'']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                                     <?php if (isset($component)) { $__componentOriginalad742a4cec028b79c2b25663b90a82c0d789eb62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Image::class, ['id' => 'logo','name' => 'logo','placeholder' => ''.e($orgunit->logoUrl).'','destroyAction' => ''.e($orgunit->logo ? route('admin.orgunits.logo.destroy', $orgunit) : null).'','title' => 'Логотип']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'title','name' => 'title','required' => true,'title' => 'Полное название','value' => ''.e(old('title', $orgunit->title)).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'short_title','name' => 'short_title','title' => 'Сокращенное название','value' => ''.e(old('title', $orgunit->short_title)).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Select2::class, ['id' => 'legal_form_id','name' => 'legal_form_id','required' => true,'url' => ''.e(route('admin.orgunits.legal_forms.view')).'','selectedUrl' => '/admin/orgunits/legal_forms','value' => ''.e(old('legal_form_id', $orgunit->legal_form_id) ?? '').'','title' => 'Организационно-правовая форма','placeholder' => 'Выбор организационно-правовой формы']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Address::class, ['id' => 'legal_address','name' => 'legal_address','region' => ''.e(optional($orgunit->legal_address)->region).'','city' => ''.e(optional($orgunit->legal_address)->city).'','street' => ''.e(optional($orgunit->legal_address)->street).'','house' => ''.e(optional($orgunit->legal_address)->house).'','title' => 'Юридический адрес']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Address::class, ['id' => 'fact_address','name' => 'fact_address','region' => ''.e(optional($orgunit->fact_address)->region).'','city' => ''.e(optional($orgunit->fact_address)->city).'','street' => ''.e(optional($orgunit->fact_address)->street).'','house' => ''.e(optional($orgunit->fact_address)->house).'','title' => 'Фактический адрес']); ?>
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

                                     <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['name' => 'code_access','title' => 'Ключ регистрации','prependIcon' => 'la la-key','value' => ''.e($orgunit->code_access).'','readonly' => true]); ?>
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

                                    <input type="text" name="parent_id" id="parent_id" value="<?php echo e(old('parent_id', request('parent_id'))); ?>" hidden>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="user-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">
































































                                <select name="users_orgunit_id[]" id="users_orgunit_id" multiple="multiple" disabled>
                                    <?php $__currentLoopData = $orgunit->users(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->last_name); ?> <?php echo e($user->first_name); ?> <?php echo e($user->middle_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="location-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                <?php


                                if(isset($orgunit->search_location)) {

                                    $current_location=count($orgunit->search_location)+1;
                                } else {
                                    $current_location=0;
                                }
                                ?>

                                <script>
                                    search_location=1;

                                    setInterval(function() {
                                        for(i=1;i<=<?php echo e($current_location); ?>;i++) {
                                            document.getElementById('div-search_location_' + i + '-street').style.display = "none";
                                            document.getElementById('div-search_location_'+i+'-house').style.display = "none";
                                        }
                                    },1000);
                                </script>



                                <script>

                                   var current_location=<?php echo e($current_location); ?>;

                                   var loaded= new Map([]);
                                   var global_selected_id=0;


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
                                               console.log('Классы');
                                               let year;
                                               let class_name;
                                               result.forEach(function (item) {

                                                   var option = document.createElement('option');
                                                   year = item.year === null ? '' : "(" + item.year + ")"
                                                   class_name = item.number + item.letter + year;
                                                   option.value = item.id;

                                                   current_class_in_classes = class_id.indexOf((item.id).toString());
                                                   if (current_class_in_classes >= 0) {
                                                       option.selected = true;
                                                       values_classes_select2.push(item.id);
                                                   }

                                                   option.text = class_name;
                                                   selectElement.add(option);

                                               });

                                               $('#class_id_' + id).val(values_classes_select2).text.trigger('change');

                                           });
                                       }
                                   }




                                   function autoren (item) {
                                       console.log ("Favorit " + item.id+" "+item.text)
                                   }

                                    function addLocation() {

                                       if(current_location == 0) {
                                           document.getElementById('main_div_location_1').style.display="block";

                                       } else {
                                           document.getElementById('main_div_location_'+current_location).style.display="block";
                                       }
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




                                <?php
                                    $count_location=0;
                                ?>


                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


                                <?php if(isset($orgunit->search_location)): ?>
                               <?php $__currentLoopData = $orgunit->search_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($location_item)): ?>
                                <?php
                                    $count_location++;
                                    $location=$location_item["region"];
                                    $city=$location_item["city"];
                                    $schools_id=@$location_item["schools_id"];
                                    $class_id=@$location_item["class_id"];// это не id класса, номер класса и буква класса
                                ?>

                                        <div id="main_div_location_<?php echo e($count_location); ?>" style="display:block">
                                 <?php if (isset($component)) { $__componentOriginala17b633d65f8f3e926f86950ce22a6bda77142d8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Address::class, ['id' => 'search_location_'.e($count_location).'','name' => 'search_location_'.e($count_location).'','title' => 'Область поиска наставников №'.e($count_location).'','region' => ''.e($location).'','city' => ''.e($city).'','required' => 'true']); ?>
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


                                            <table><tr><td>Компания: </td><td width="5"></td><td>
                                                        <select name="schools_id_<?php echo e($count_location); ?>" id="schools_id_<?php echo e($count_location); ?>">

                                                        </select>
                                                    </td></tr></table>


                                            <br>
                                            <table><tr><td>Структурное подразделение: </td><td width="5"></td><td>
                                                        <select name="class_id_<?php echo e($count_location); ?>[]" id="class_id_<?php echo e($count_location); ?>" multiple="multiple">

                                                        </select>
                                                        <input type="hidden" name="school_value_<?php echo e($count_location); ?>" id="school_value_<?php echo e($count_location); ?>" value="">
                                                    </td></tr></table><br><br>

                                                        <script>
                                                            $(document).ready(function () {
                                                                var init_select<?php echo e($count_location); ?> = true;
                                                                $('#class_id_<?php echo e($count_location); ?>').select2({
                                                                    width: '300px',
                                                                    placeholder: "Выберите структурное подразделение",
                                                                    allowClear: true
                                                                });

                                                                $('#search_location_<?php echo e($count_location); ?>-city').on('change', function () {
                                                                    get_schools(<?php echo e($count_location); ?>, '<?php echo e($schools_id); ?>');
                                                                });

                                                                $(document).on('change', 'select#schools_id_<?php echo e($count_location); ?>', function () {
                                                                    let class_id<?php echo e($count_location); ?>;

                                                                    if (init_select<?php echo e($count_location); ?>) {
                                                                        class_id<?php echo e($count_location); ?> = <?php echo json_encode($class_id, JSON_UNESCAPED_UNICODE) ?>;
                                                                        init_select<?php echo e($count_location); ?> = false;
                                                                    } else {
                                                                        class_id<?php echo e($count_location); ?> = [];
                                                                    }
                                                                    get_classes(<?php echo e($count_location); ?>, class_id<?php echo e($count_location); ?>);
                                                                });
                                                            });
                                                        </script>
                                        </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>



                                <?php for($i=$count_location+1;$i<=$count_location+10;$i++): ?>

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
                                                    <select name="schools_id_<?php echo e($i); ?>" data-id="<?php echo e($i); ?>"  id="schools_id_<?php echo e($i); ?>" class="school-search">

                                                    </select>
                                                </td></tr></table>


                                        <br>
                                        <table><tr><td>Структурное подразделение: </td><td width="5"></td><td>
                                                    <select name="class_id_<?php echo e($i); ?>[]" id="class_id_<?php echo e($i); ?>" multiple="multiple">
                                                    </select>

                                                    <input type="hidden" name="school_value_<?php echo e($i); ?>" id="school_value_<?php echo e($i); ?>" value="">

                                                </td></tr></table><br><br>

                                        <script>
                                            $(document).ready(function () {

                                                $('#class_id_<?php echo e($i); ?>').select2({
                                                    width: '300px',
                                                    placeholder: "Выберите структурное подразделение",
                                                    allowClear: true
                                                });
                                                $(document).on('change', '#search_location_<?php echo e($i); ?>-city', function() {
                                                    get_schools(<?php echo e($i); ?>);
                                                });

                                                $(document).on('change', '#schools_id_<?php echo e($i); ?>', function() {
                                                    get_classes(<?php echo e($i); ?>);
                                                });
                                            });
                                        </script>

                                    </div>
                                <?php endfor; ?>

                                <input type="hidden" name="current_location" id="current_location" value="<?php echo e($current_location); ?>">
                                <br>
                                <br>
                                <input type="button" onClick="addLocation()" value="Добавить область поиска">
                                <input type="button" onClick="removeLocation()" value="Убрать область поиска">
                                <br>
                                <br>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="profiles-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">



                                 <?php if (isset($component)) { $__componentOriginal962f3db9c8a1ce5212f91dd0c65c51e1ccccc36d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Select2::class, ['id' => 'activity_kind_id','name' => 'activity_kind_id[]','required' => true,'title' => 'Профили работодателя','placeholder' => 'Выбор профиля','event' => 'setActivityKindId','multiple' => true,'value' => ''.e(implode(',', old('activity_kind_id', $orgunit->activityKindIdsArr))).'','url' => ''.e(route('admin.orgunits.activity_kinds.view')).'','selectedUrl' => '/admin/orgunits/activity_kinds']); ?>
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

                                <br>

                                <h3>Целевые показатели для каждого из профилей (с учетом локаций поиска)</h3>





                                <table>
                                <?php $__currentLoopData = $orgunit->activityKindIdsArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile_pos=>$profile_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <?php

                                        ///поиск названия $profile_id
                                        $user_profile=\Domain\UserProfile\Models\UserProfile::find($profile_id);
                                        if($user_profile) {
                                            $profile_name[$profile_id]=$user_profile->title;
                                        }


                                    ?>

                                    <tr><td>Профиль <?php echo e(@$profile_name[$profile_id]); ?>, потребность: <b></b></td><td width="5"></td><td>
                                            <input type="text" name="profile_target[<?php echo e($profile_id); ?>]" value="<?php echo e(@$orgunit->profile_target[$profile_id]); ?>">
                                        </td><td>&nbsp;&nbsp;человек</td></tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                                <br><br>

                            </div>
                        </div>
                    </div>

                    <?php

                        $quiz_question_text=@$orgunit->personal_quiz["quiz_question_text"];
                        $type_quiz_question=@$orgunit->personal_quiz["type_quiz_question"];
                        $quiz_variants=@$orgunit->personal_quiz["quiz_variants"];
                        $quiz_answers=@$orgunit->personal_quiz["quiz_answers"];
                        $video_link=@$orgunit->personal_quiz["video_link"];
                        $photo_link=@$orgunit->personal_quiz["photo_link"];

                        $quiz_title=@$orgunit->personal_quiz["quiz_title"];
                        $quiz_description=@$orgunit->personal_quiz["quiz_description"];
                        $answer_bucklet=@$orgunit->personal_quiz["answer_bucklet"];

                        if(is_null($quiz_question_text)) {
                             $quiz_question_text=array();
                        }


                        $current_answers=0;
                        ////подсчет активных вопросов
                        foreach($quiz_question_text as $q_text) {
                            if(!is_null($q_text) and $q_text!="") {
                                $current_answers++;
                            }
                        }

                    ?>


                    <div class="tab-pane show px-7" id="quiz-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-12 my-2">
                                <script>
                                    $(document).ready(function () {

                                        $('#users_orgunit_id').select2({
                                            width: '300px',
                                            placeholder: "Выберите структурное подразделение",
                                            allowClear: true,
                                            "readonly": true,
                                        });
                                    });
                                </script>
                                <script>
                                    var current_answers = <?php echo e($current_answers); ?>;

                                    function addQuestion() {

                                        current_answers = current_answers + 1;
                                        document.getElementById('total_quiz_question_' + current_answers).style.display = "block";


                                        document.getElementById('current_answers').value = current_answers;
                                    }


                                    function removeQuestion() {

                                        if (current_answers > 1) {


                                            document.getElementById('total_quiz_question_' + current_answers).style.display = "none";
                                            current_answers = current_answers - 1;

                                            document.getElementById('current_answers').value = current_answers;
                                        }
                                    }

                                    let input_code_access = $('input[name=code_access]');
                                    input_code_access.css('color', '#b5b5c3');
                                    $('.la.la-key').on('click', function () {
                                        if (input_code_access.is('[readonly]')) {
                                            input_code_access.prop("readonly", false);
                                            input_code_access.css('color', '#000000');
                                            $(this).css('color', '#000000');
                                        } else {
                                            input_code_access.prop("readonly", true);
                                            input_code_access.css('color', '#b5b5c3');
                                            $(this).css('color', '#b5b5c3');
                                        }
                                    });

                                </script>

                                <h3>Общие данные опросника КВИЗ</h3>

                                 <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'quiz_title','name' => 'quiz_title','title' => 'Заголовок опросника','value' => ''.e($quiz_title).'']); ?>
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


                                 <?php if (isset($component)) { $__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\SummernoteEditor::class, ['id' => 'quiz_description','name' => 'quiz_description','title' => 'Описание опросника','value' => ''.e($quiz_description).'']); ?>
<?php $component->withName('inputs.summernote-editor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07)): ?>
<?php $component = $__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07; ?>
<?php unset($__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


                                <table><tr>
                                        <td>Буклет с ответами:</td><td width="5"></td><td>
                                            <input type="file" name="answer_bucklet">
                                        </td>
                                    </tr></table>

                                <?php if(@$answer_bucklet!=""): ?>

                                    <a href="<?php echo e(@$answer_bucklet); ?>" target="_blank"><?php
                                            echo basename($answer_bucklet);
                                        ?></a>

                                <?php endif; ?>
                                <br><br>




                            <h3>Добавление вопроса в опросник КВИЗ</h3>
                                <input type="hidden" id="current_answers" value="<?php echo e($current_answers); ?>">



                                <?php for($i=1;$i<=$current_answers+30;$i++): ?>

                                <div id="total_quiz_question_<?php echo e($i); ?>" style="<?php if($i<=$current_answers): ?> display: block; <?php else: ?>  display: none; <?php endif; ?>">
                                    <h3>Вопрос №<?php echo e($i); ?></h3>
                                    <table>
                                        <tr>
                                            <td width="250">
                                                Укажите текст вопроса:
                                            </td><td width="5"></td>
                                            <td>

                                                 <?php if (isset($component)) { $__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\SummernoteEditor::class, ['id' => 'quiz_question_text'.e($i).'','name' => 'quiz_question_text['.e($i).']','value' => ''.e(@$quiz_question_text[$i]).'']); ?>
<?php $component->withName('inputs.summernote-editor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07)): ?>
<?php $component = $__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07; ?>
<?php unset($__componentOriginaldaf31c5f9a493efed77ed4cafa70096639381b07); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Укажите тип вопроса:
                                            </td><td width="5"></td>
                                            <td>
                                                 <select name="type_quiz_question[<?php echo e($i); ?>]">
                                                     <option value="one_variant" <?php if(@$type_quiz_question[$i]=="one_variant"): ?> selected <?php endif; ?>>Один вариант</option>
                                                     <option value="many_variants" <?php if(@$type_quiz_question[$i]=="many_variants"): ?> selected <?php endif; ?>>Много вариантов</option>
                                                     <option value="text" <?php if(@$type_quiz_question[$i]=="text"): ?> selected <?php endif; ?>>Текст</option>
                                                 </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Укажите предлагаемые варианты ответа на вопрос:<br>(пустое поле если вопрос открытый)
                                            </td><td width="5"></td>
                                            <td>
                                                <textarea name="quiz_variants[<?php echo e($i); ?>]" cols="55" rows="3"><?php echo e(@$quiz_variants[$i]); ?></textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Правильный ответ (или ответы) на вопрос: <br>(за что начисляется балл)
                                            </td><td width="5"></td>
                                            <td>
                                                <textarea name="quiz_answers[<?php echo e($i); ?>]" cols="55" rows="3"><?php echo e(@$quiz_answers[$i]); ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Ссылка на видео:<br>(опционально)
                                            </td><td width="5"></td>
                                            <td>
                                                <input type="text" name="video_link[<?php echo e($i); ?>]" value="<?php echo e(@$video_link[$i]); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Загрузить фото (картинку):<br>
                                            </td><td width="5"></td>
                                            <td>
                                                <input type="file" name="photo[<?php echo e($i); ?>]"><br>
                                                <?php if(@$photo_link[$i]!=""): ?>
                                                    <br>
                                                   <a href="<?php echo e(@$photo_link[$i]); ?>" target="_blank"><img src="<?php echo e(@$photo_link[$i]); ?>" width="150"></a>
<br>
                                                    <input type="checkbox" name="hide_photo[<?php echo e($i); ?>]" value="1"> Убрать это фото
                                                    <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </div>


                                <?php endfor; ?>

                                <br>
                                <input type="button" onClick="addQuestion()" value="Добавить вопрос">
                                <input type="button" onClick="removeQuestion()" value="Удалить вопрос">

                                <br>
                                <br>

                                 <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','link' => ''.e(route('orgunits.personal_quiz', $orgunit)).'','target' => '_blank','title' => ''.e(__('Просмотр КВИЗа (опросника)')).'']); ?>
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
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="landing-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                 <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['id' => 'landing_address','name' => 'landing_address','title' => ' URL вашего лендинга','value' => ''.e($orgunit->landing_address).'']); ?>
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



                                <table><tr><td valign="top" style="padding:5px">
                                            <input type="radio" name="landing_type" value="1" <?php if($orgunit->landing_type==1): ?> checked <?php endif; ?>></td><td width="5"></td><td>

                                            <h3>1. Лендинг на основе нашего шаблона</h3>
                                            <Br><br>
                                            <table><tr><td>
                                                        <select name="landing_template" style="width:200px;height:28px;">
                                                            <option value="1" <?php if($orgunit->landing_template==1): ?> selected <?php endif; ?>>Стандартный 1</option>
                                                        </select></td><td width="5"></td><td>


                                                         <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','target' => '_blank','link' => ''.e($orgunit->landing_address).'','title' => ''.e(__('Просмотр лендинга')).'']); ?>
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

                                                    </td></tr></table>

                                        </td> </tr></table>

                                <br>
                                <br>
                                <br>


                                <table><tr><td valign="top" style="padding:5px">
                                            <input type="radio" name="landing_type" value="2"
                                                   <?php if($orgunit->landing_type==2): ?> checked <?php endif; ?>
                                            ></td><td width="5"></td><td>

                                            <h3>2. Загрузка вашего лендинга с помощью FTP</h3>

                                            <br>
                                            <textarea name="ftp_access" style="width:350px;height:250px"><?php echo e($orgunit->ftp_access); ?></textarea>

                                        </td> </tr></table>

                                <br>
                                <br>
                                <br>

                                <table><tr><td valign="top" style="padding:5px">
                                            <input type="radio" name="landing_type" value="3"
                                                   <?php if($orgunit->landing_type==3): ?> checked <?php endif; ?>
                                            ></td><td width="5"></td><td>

                                            <h3>3. Установка нашего кода на вашем сайте</h3>
                                            <br>
                                            <textarea name="html_code" style="width:450px" readonly><iframe src="myURL" width="300" height="300" frameBorder="0"><?php echo e($url); ?>/partners/<?php echo e($orgunit->id); ?></iframe>

                                            </textarea>


                                        </td> </tr></table>


                                <br>
                                <br>
                                <br>



                            </div>
                        </div>
                    </div>




                </div>


                <div class="d-flex"  style="margin-left:25px">
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-success','link' => ''.e(route('admin.orgunits.create', ['parent_id' => $orgunit->id])).'','title' => ''.e(__('Добавить дочернюю')).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['type' => 'btn-outline-success','target' => '_blank','link' => ''.e($orgunit->landing_address).'','title' => ''.e(__('Просмотр лендинга')).'']); ?>
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

                    <form action="<?php echo e(route('admin.orgunits.destroy', $orgunit)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button
                                type="submit"
                                class="btn btn-danger px-4 py-2 my-1 mr-1"
                                onclick="return confirm('Вы действительно хотите удалить этого работодателя?')"
                        >
                            Удалить
                        </button>
                    </form>


                </div>

                <div class="d-flex"  style="margin-left:25px">

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

            </div>

        </div>
    </div>




<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/orgunits/edit.blade.php ENDPATH**/ ?>