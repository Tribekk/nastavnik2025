<tbody class="datatable-body">
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php
    $User = \Domain\User\Models\User::where('id', $user->user_id)->first();
            $color_td="";
    ?>
    <?php if(@$data['profiler'][$user->id]['color']=="green"): ?>

        <?php
            $color_td='lightgreen';
        ?>

        <?php endif; ?>

    <?php if(@$data['profiler'][$user->id]['color']=="red"): ?>

        <?php
            $color_td='#ff8c8a';
        ?>

    <?php endif; ?>

    <?php if(@$data['profiler'][$user->id]['color']=="yellow"): ?>

        <?php
            $color_td='yellow';
        ?>

    <?php endif; ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($users->firstItem() + $index); ?>

        </td>

        <td>
            <?php echo e($user->full_name); ?>

        </td>

        <td>
            <div class="min-w-120px max-w-120px">
                <?php echo e($user->kladr_name); ?>

            </div>
        </td>

        <td>
            <div class="min-w-110px max-w-110px">
                <?php echo $user->school; ?>

            </div>
        </td>

        <td>
            <?php echo e($user->class); ?>

        </td>

        <td>
            <?php if($user->phone): ?>
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('<?php echo e($user->phone); ?>')"><?php echo e($user->phone); ?></div>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="">
            <div class="text-break min-w-200px max-w-200px">
                <?php if($user->email): ?>
                    <a target="_blank" class="link cursor-pointer" href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                <?php else: ?>
                    <i class="la la-minus text-muted"></i>
                <?php endif; ?>
            </div>
        </td>

        <td>
            <?php if($user->parent__full_name): ?>
                <?php echo e($user->parent__full_name); ?>

            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>
        <td>
            <?php if($user->parent__phone): ?>
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('<?php echo e($user->parent__phone); ?>')"><?php echo e($user->parent__phone); ?></div>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>
        <td>
            <div class="text-break min-w-200px max-w-200px">
                <?php if($user->parent__email): ?>
                    <a target="_blank" class="link cursor-pointer" href="mailto:<?php echo e($user->parent__email); ?>"><?php echo e($user->parent__email); ?></a>
                <?php else: ?>
                    <i class="la la-minus text-muted"></i>
                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-250px max-w-250px">
                <?php if($user->parent_questionnaire_finished): ?>
                   <span class="text-success">Заполнена анкета родителя</span>
                    <a target="_blank" href="<?php echo e(route('quiz.results.parent_questionnaire', $user->parent_id)."?backTo=".urlencode(url()->full())); ?>" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                <?php else: ?>
                    <span class="text-primary">Нет анкеты родителя</span>
                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php if($user->student_questionnaire_finished): ?>
                    <span class="text-success">Да</span>
                    <a target="_blank" href="<?php echo e(route('quiz.results.student_questionnaire', $user->user_id)."?backTo=".urlencode(url()->full())); ?>" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                <?php else: ?>
                    <span class="text-primary">Нет</span>
                <?php endif; ?>
            </div>
        </td>



        <td  style="background-color: <?php echo e($color_td); ?>;">
            <div class="min-w-80px">
                <?php
                //dd($data['profiler'][$user->id]);
                ?>
                <?php if(@$data['profiler'][$user->id]['color']=="green"): ?>
                        Соответствует  профилю
                <?php endif; ?>
                    <?php if(@$data['profiler'][$user->id]['color']=="yellow"): ?>
                        Частично соответствует  профилю
                    <?php endif; ?>
                    <?php if(@$data['profiler'][$user->id]['color']=="red"): ?>
                        Не соответствует  профилю
                    <?php endif; ?>
            </div>
        </td>


        <td  style="background-color: <?php echo e($color_td); ?>;">
            <div class="min-w-200px max-w-200px">


                     <?php if(@$data['profiler'][$user->id]['color']=="green"): ?>
                        Соответствует целевому профилю
                    <?php endif; ?>
                    <?php if(@$data['profiler'][$user->id]['color']=="yellow"): ?>
                        Частично соответствует целевому профилю
                    <?php endif; ?>
                    <?php if(@$data['profiler'][$user->id]['color']=="red"): ?>
                        Не соответствует целевому профилю
                    <?php endif; ?>

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">

                <?php
                    @$items_profiles=@$data['profiler'][$user->id]['favorite_lessons'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                    <?php $type="orange"; ?>
                                <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">

                <?php
                    @$items_profiles=$data['profiler'][$user->id]['medium_score'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>



            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
            <?php
                @$items_profiles=$data['profiler'][$user->id]['future_view'];
            ?>

            <?php if(!is_null($items_profiles)): ?>

                <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($type=="yellow"): ?>
                            <?php $type="orange"; ?>
                        <?php endif; ?>

                        <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php
                    @$items_profiles=$data['profiler'][$user->id]['own_city'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($items); ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">

                <?php
                    @$items_profiles=$data['profiler'][$user->id]['limit_health'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php
                    @$items_profiles=$data['profiler'][$user->id]['personal_character'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </td>

        <td>
            <div class="min-w-200px max-w-200px">
                <?php
                    @$items_profiles=$data['profiler'][$user->id]['motivations'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </td>


        <td>
            <div class="min-w-200px max-w-200px">

                <?php
                    @$items_profiles=$data['profiler'][$user->id]['targetOrder'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


            </div>
        </td>

        <td>
            <div class="min-w-200px max-w-200px">

                <?php
                    @$items_profiles=$data['profiler'][$user->id]['ready_profession'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                        <?php if($type=="yellow"): ?>
                            <?php $type="orange"; ?>
                        <?php endif; ?>

                        <font color="<?php echo e($type); ?>"><?php echo e($items); ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </td>


        <td>
            <div class="min-w-200px max-w-200px">

                <div class="min-w-80px">
                    <?php if($user->base_tests_finished): ?>
                        <span class="text-success">Да</span>
                        <a target="_blank" href="<?php echo e(route('quiz.user_results', $user->user_id)."?backTo=".urlencode(url()->full())); ?>" data-toggle="tooltip" title="Просмотр результатов тестирования" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                    <?php else: ?>
                        <?php if($user->base_tests_precentage): ?>
                            <span class="font-orange d-block"><?php echo e($user->base_tests_precentage); ?>%</span>
                        <?php else: ?>
                            <span class="text-primary d-block">Нет</span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px font-blue">
                <?php echo e($user->professional_types_str); ?>

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <!--<span class="<?php echo e($user->baseStepSelectionColorClass); ?>">Портрет личности</span>-->
                    <?php if(!empty($User->characterTraitResult->values) && count($User->characterTraitResult->values)>0): ?>
                        <?php $__currentLoopData = $User->characterTraitResult->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="<?php echo e($value->is_higher ? 'text-warning' : 'font-alla'); ?>">
                                <b><?php echo e($value->title); ?></b> - <?php echo e($value->percentage); ?>%
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                <?php
                    @$items_profiles=$data['profiler'][$user->id]['tipag'];
                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                <?php
                    @$items_profiles=$data['profiler'][$user->id]['alt_component'];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <?php if($type=="yellow"): ?>
                                    <?php $type="orange"; ?>
                                <?php endif; ?>

                    <?php if(is_string($items)): ?>

                                <font color="<?php echo e($type); ?>"><?php echo e($items); ?></font><br>
                    <?php else: ?>


                        <?php endif; ?>



                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>


            </div>
        </td>
        <td>
            <div class="min-w-80px">
                <?php if($user->depth_tests_finished): ?>
                    <span class="text-success">Да</span>
                    <a target="_blank" href="<?php echo e(route('quiz.user_results', $user->user_id)."?backTo=".urlencode(url()->full())); ?>#inclinations" data-toggle="tooltip" title="Просмотр результатов тестирования" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                <?php else: ?>
                    <?php if($user->depth_tests_precentage): ?>
                        <span class="font-orange d-block"><?php echo e($user->depth_tests_precentage); ?>%</span>
                    <?php else: ?>
                        <span class="text-primary d-block">Нет</span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                <?php
                    @$items_profiles=$data['profiler'][$user->id]['inclinations'];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($item); ?></font><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                <?php
                    @$items_profiles=$data['profiler'][$user->id]['intellegense_level'];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo e($items); ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                <?php
                    @$items_profiles=$data['profiler'][$user->id]['type_of_thinking'];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                            <?php if($type=="yellow"): ?>
                                <?php $type="orange"; ?>
                            <?php endif; ?>

                            <font color="<?php echo e($type); ?>"><?php echo $items; ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>


            </div>
        </td>

        <td>
            <div class="min-w-200px max-w-200px">

                <?php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][1];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                        <?php if($type=="yellow"): ?>
                            <?php $type="orange"; ?>
                        <?php endif; ?>

                        <font color="<?php echo e($type); ?>"><?php echo $items; ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

           </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][2];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                        <?php if($type=="yellow"): ?>
                            <?php $type="orange"; ?>
                        <?php endif; ?>

                        <font color="<?php echo e($type); ?>"><?php echo $items; ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][4];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                        <?php if($type=="yellow"): ?>
                            <?php $type="orange"; ?>
                        <?php endif; ?>

                        <font color="<?php echo e($type); ?>"><?php echo $items; ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][3];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                        <?php if($type=="yellow"): ?>
                            <?php $type="orange"; ?>
                        <?php endif; ?>

                        <font color="<?php echo e($type); ?>"><?php echo $items; ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][5];

                ?>

                <?php if(!is_null($items_profiles)): ?>

                    <?php $__currentLoopData = $items_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                        <?php if($type=="yellow"): ?>
                            <?php $type="orange"; ?>
                        <?php endif; ?>

                        <font color="<?php echo e($type); ?>"><?php echo $items; ?></font><br>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </div>
        </td>










        <td>
            <?php if($user->got_consultation_status == 'carried_out'): ?>
                <span class="text-success">Ребенок получил консультацию</span>
            <?php elseif($user->got_consultation_status == 'invited'): ?>
                <span class="font-orange">Приглашен</span>
            <?php else: ?>
                <span class="text-primary">Не приглашен</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if($user->got_consultation_status_with_parent == 'carried_out'): ?>
                <span class="text-success">Родитель получил консультацию</span>
            <?php elseif($user->got_consultation_status_with_parent == 'invited'): ?>
                <span class="font-orange">Приглашен</span>
            <?php else: ?>
                <span class="text-primary">Не приглашен</span>
            <?php endif; ?>
        </td>
        <td>
            <div class="min-w-200px max-w-200px text-center">
                <span class="font-blue">
                    <?php if($user->recommend == 'recommend'): ?>
                        Рекомендован
                    <?php elseif($user->agree == 'not_recommend'): ?>
                        Не рекомендован
                    <?php else: ?>
                        Нет информации
                    <?php endif; ?>
                </span>
            </div>
        </td>
        <td>
            <div class="min-w-150px max-w-150px">
                <?php if($user->agree == 'agree'): ?>
                    <span class="font-blue">Согласен</span>
                <?php elseif($user->agree == 'not_agree'): ?>
                    <span class="font-blue">Не согласен</span>
                <?php elseif($user->agree == 'think'): ?>
                    <span class="font-blue">Думает</span>
                <?php else: ?>
                    <span class="font-blue">Нет информации</span>
                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="min-w-150px max-w-150px">
                <span class="font-blue"><?php echo e($user->count_visited_events); ?></span> / <span class="text-primary"><?php echo e($user->count_events); ?></span>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <span class="font-blue"> Направление </span>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <span class="font-blue"> <?php echo e($user->events_formats); ?> </span>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <?php if($data["personal_quiz"][$user->id]==0): ?>

                   <font color="red">Нет</font>
                    <?php else: ?>

                        Да, <?php echo e($data["personal_quiz"][$user->id]); ?> баллов

                    <?php endif; ?>

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <span class="font-blue">Средняя оценка по итогам мероприятий </span>
            </div>
        </td>
        <td>
            <div class="text-nowrap">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('employer.students.selection-results', ['row' => $user])->html();
} elseif ($_instance->childHasBeenRendered('OEjmHjQ')) {
    $componentId = $_instance->getRenderedChildComponentId('OEjmHjQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('OEjmHjQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OEjmHjQ');
} else {
    $response = \Livewire\Livewire::mount('employer.students.selection-results', ['row' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('OEjmHjQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:employer.students.selection-results>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
              <textarea id="personal_notes_<?php echo e($user->id); ?>_simple" cols="15" rows="3" onInput="save_personal_notes(<?php echo e($user->id); ?>, 'simple')" onChange="save_personal_notes(<?php echo e($user->id); ?>, 'simple')"><?php echo e(@$data["note_simple"][$user->id]); ?></textarea>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <textarea id="personal_notes_<?php echo e($user->id); ?>_events" cols="15" rows="3" onInput="save_personal_notes(<?php echo e($user->id); ?>, 'events')" onChange="save_personal_notes(<?php echo e($user->id); ?>, 'events')"><?php echo e(@$data["note_events"][$user->id]); ?></textarea>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <span class="font-blue"> Единое окно обмена и хранения </span>
            </div>
        </td>









        <td>
            <div class="min-w-200px max-w-200px">
                <span class="<?php echo e($user->depthStepSelectionColorClass); ?>">
                    <?php if(!empty($user->depth_tests_finished)): ?>
                        <?php echo e($user->depthStepSelectionLabel); ?>

                    <?php else: ?>
                        Не прошел тесты
                    <?php endif; ?>
                </span>
            </div>
        </td>
        <td>
            <?php if($user->recommend == 'recommend'): ?>
                <span class="text-success">Рекомендован</span>
            <?php elseif($user->recommend == 'not_recommend'): ?>
                <span class="text-primary">Не рекомендован</span>
            <?php else: ?>
                <span class="text-primary">Нет информации</span>
            <?php endif; ?>
        </td>


        <td>
           <div class="min-w-300px d-flex flex-column">
               <button class="btn btn-success px-4 mt-1" onclick="sendNotify(<?php echo e($user->user_id); ?>)">Отправить сообщение</button>
               <button class="btn btn-success px-4 mt-1" onclick="sendInviteEvent(<?php echo e($user->user_id); ?>)">Пригласить на мероприятие</button>
               <?php if(!$user->base_tests_finished): ?>
                    <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(<?php echo e($user->user_id); ?>, 'base')">Пригласить на базовое тестирование</button>
               <?php endif; ?>
               <?php if(!$user->depth_tests_finished): ?>
                    <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(<?php echo e($user->user_id); ?>, 'depth')">Пригласить на углубленное тестирование</button>
               <?php endif; ?>
               <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(<?php echo e($user->user_id); ?>, 'personal_quiz')">Пригласить на квиз</button>

           </div>
        </td>








        <td>
            <div class="min-w-200px">
                <?php if($user->invited_depth_tests): ?>
                    <span class="text-success">Приглашен</span>
                <?php else: ?>
                    <span class="text-muted d-block">Не приглашен на глубинное тестирование</span>
                <?php endif; ?>
            </div>
        </td>
    </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>

<?php $__env->startPush('scripts'); ?>
    <script>
        function sendInviteTests(userId = null, type) {
            const titleTypes = {
                depth: 'Приглашение на глубинное тестирование',
                base: 'Приглашение на базовое тестирование',
                personal_quiz: 'Приглашение КВИЗ работодателя',
            };

            const inputMessage =
                '<div class="form-group text-left">' +
                '<label for="swal__message" class="font-size-h6 font-weight-bolder text-dark required">Введите текст приглашения</label>' +
                '<textarea name="message" style="resize: none" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal__message" placeholder="Текст приглашения" rows="4"></textarea>' +
                '<div class="text-dark-50 mt-2" style="font-size:13px;">* Ссылка будет автоматически подставлена</div>' +
                '</div>';

            Swal.fire({
                title: `<h2 class="font-weight-bold font-size-h3 p-0 mb-5 font-hero">${titleTypes[type]}</h2>`,
                html: inputMessage,
                confirmButtonColor: 'var(--success)',
                confirmButtonText: 'Отправить',
                showCancelButton: true,
                cancelButtonText: 'Закрыть',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                width: 600,
                preConfirm: () => {
                    const message = document.getElementById('swal__message').value;

                    return $.post(userId ? `/employer/send_invite/${userId}` : `/employer/send_invite`, {
                        message,
                        type: type+'_tests',
                        users: <?php echo e($user_ids ?? []); ?>,
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Успешно',
                            confirmButtonColor: 'var(--success)',
                            html: `Приглашение отправлено`,
                        });

                        return 1;
                    }).catch(error => {
                        let message = '';

                        if(!!error.message) {
                            message = error.message;
                        } else if(error.responseJSON.errors) {
                            const firstKey = Object.keys(error.responseJSON.errors)[0];
                            message = error.responseJSON.errors[firstKey][0];
                        } else if (error.responseJSON.message) {
                            message = error.responseJSON.message;
                        } else {
                            message = error;
                        }

                        Swal.showValidationMessage(`${message}`);
                    });
                },
            });

        }
        var tmp_sms_js = [];
<?php
    $titleSms = '';

    $field_tmp_sms = auth()->user()->tmp_sms;
    if (!empty($field_tmp_sms)){
    $titleSms = '<div class="form-group text-left"><select id="tmp-sms" class="form-control form-control-solid py-2 px-3 rounded-lg">';
    $titleSms .= '<option>Выберите шаблон sms</option>';;

    $tmpSms = unserialize(auth()->user()->tmp_sms);

    foreach ($tmpSms as $key => $tmp) {
        $zag = $tmp['zag'];
        $text = $tmp['text'];
        $url =  $tmp['url'];
        $titleSms .= '<option value="'.$key.'">'.$zag.'</option>';
?>

    tmp_sms_js[<?php echo e($key); ?>] = ['<?php echo e($zag); ?>', '<?php echo e(str_replace(PHP_EOL, '\n', $text)); ?>', '<?php echo e($url); ?>'];
    <?php
    }
     $titleSms .= '</select></div>';
 ?>

    $(document).on('change', '#tmp-sms', function () {
        let key_tmp_sms = $(this).val()
        $('#swal__title').val(tmp_sms_js[key_tmp_sms][0]);
        $('#swal__message, #swal-sms__message').text(tmp_sms_js[key_tmp_sms][1]);
        $('#swal__url').val(tmp_sms_js[key_tmp_sms][2]);
    });
        <?php
        }
        ?>
        const selectSms = '<div><?php echo $titleSms; ?></div>';

        function sendNotify(userId = null) {

            const inputTitle =
                '<div class="form-group text-left">' +
                '<label for="swal__title" class="font-size-h6 font-weight-bolder text-dark required">Введите заголовок сообщения</label>' +
                '<input name="title" class="form-control form-control-solid py-2 px-3 rounded-lg" id="swal__title" placeholder="Заголовок сообщения"/>' +
                '</div>';

            const inputMessage =
                '<div class="form-group text-left">' +
                '<label for="swal__message" class="font-size-h6 font-weight-bolder text-dark required">Введите текст сообщения</label>' +
                '<textarea name="message" style="resize: none" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal__message" placeholder="Текст сообщения" rows="6"></textarea>' +
                '<div class="text-dark-50 mt-2" style="font-size:13px;">* Ссылка будет автоматически подставлена</div>' +
                '</div>';

            const inputUrl =
                '<div class="form-group text-left">' +
                '<label for="swal__url" class="font-size-h6 font-weight-bolder text-dark">Введите ссылку, которую отобразить пользователю</label>' +
                '<input name="title" class="form-control form-control-solid py-2 px-3 rounded-lg" id="swal__url" placeholder="Заголовок сообщения"/>' +
                '</div>';

            Swal.fire({
                title: `<h2 class="font-weight-bold font-size-h3 p-0 mb-5 font-hero">Отправка сообщения</h2>`,
                html: selectSms + inputTitle + inputMessage + inputUrl,
                confirmButtonColor: 'var(--success)',
                confirmButtonText: 'Отправить',
                showCancelButton: true,
                cancelButtonText: 'Закрыть',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                width: 600,
                preConfirm: () => {
                    const title = document.getElementById('swal__title').value;
                    const message = document.getElementById('swal__message').value;
                    const url = document.getElementById('swal__url').value;

                    return $.post( userId ? `/employer/send_notify/${userId}` : `/employer/send_notify`, {
                        title,
                        message,
                        url,
                        users: <?php echo e($user_ids ?? []); ?>,
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Успешно',
                            confirmButtonColor: 'var(--success)',
                            html: `Сообщение отправлено`,
                        });

                        return 1;
                    }).catch(error => {
                        let message = '';

                        if(!!error.message) {
                            message = error.message;
                        } else if(error.responseJSON.errors) {
                            const firstKey = Object.keys(error.responseJSON.errors)[0];
                            message = error.responseJSON.errors[firstKey][0];
                        } else if (error.responseJSON.message) {
                            message = error.responseJSON.message;
                        } else {
                            message = error;
                        }

                        Swal.showValidationMessage(`${message}`);
                    });
                },
            });
        }

        function sendInviteEvent(userId = null, type) {
            var events = '';

            <?php if(Auth::user()->orgunitEvents): ?>
                <?php $__currentLoopData = Auth::user()->orgunitEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    events += '<option value="<?php echo e($event->id); ?>"><?php echo e($event->title); ?></option>';
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            const inputEvent =
                '<div class="form-group text-left">' +
                '<label for="swal__event" class="font-size-h6 font-weight-bolder text-dark required">Выберите мероприятие</label>' +
                '<select name="event_id" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" style="width: 100%;" id="swal__event">'+events+'</select>' +
                '</div>';

            const inputMessage =
                '<div class="form-group text-left">' +
                '<label for="swal__message" class="font-size-h6 font-weight-bolder text-dark required">Введите текст приглашения</label>' +
                '<textarea name="message" style="resize: none" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal__message" placeholder="Текст приглашения" rows="4"></textarea>' +
                '<div class="text-dark-50 mt-2" style="font-size:13px;">* Ссылка будет автоматически подставлена</div>' +
                '</div>';

            Swal.fire({
                title: `<h2 class="font-weight-bold font-size-h3 p-0 mb-5 font-hero">Приглашение на мероприятие</h2>`,
                html: inputEvent + inputMessage,
                confirmButtonColor: 'var(--success)',
                confirmButtonText: 'Отправить',
                showCancelButton: true,
                cancelButtonText: 'Закрыть',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                width: 600,
                preConfirm: () => {
                    const message = document.getElementById('swal__message').value;
                    const eventId = document.getElementById('swal__event').value;

                    return $.post(userId ? `/employer/send_invite_event/${userId}` : `/employer/send_invite_event`, {
                        message,
                        event_id: eventId,
                        users: <?php echo e($user_ids ?? []); ?>,
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Успешно',
                            confirmButtonColor: 'var(--success)',
                            html: `Приглашение отправлено`,
                        });

                        return 1;
                    }).catch(error => {
                        let message = '';

                        if(!!error.message) {
                            message = error.message;
                        } else if(error.responseJSON.errors) {
                            const firstKey = Object.keys(error.responseJSON.errors)[0];
                            message = error.responseJSON.errors[firstKey][0];
                        } else if (error.responseJSON.message) {
                            message = error.responseJSON.message;
                        } else {
                            message = error;
                        }

                        Swal.showValidationMessage(`${message}`);
                    });
                },
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/employer/reports/_students/_table-body.blade.php ENDPATH**/ ?>