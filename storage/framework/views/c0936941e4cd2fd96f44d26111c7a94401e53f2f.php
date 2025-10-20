<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>
        <?php echo $__env->make('layout.partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <div class="d-flex flex-column flex-root">
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white wizard wizard-2" id="ks_login">
                <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: var(--primary)">
                    <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                        <div style="width: fit-content;margin: auto;padding: 20px;" class="text-center">
                            <a href="<?php echo e(url('/')); ?>" class="text-center mb-10">
                                <img src="<?php echo e(asset('img/newLogo.png')); ?>" class="max-h-70px" alt=""/>
                            </a>
                            <h1 class="font-pixel text-uppercase text-center text-white ">ПРОФТЕРКЕР</h1>
                            <div class="font-pixel text-uppercase text-center"
                                 style="color: #E43C31;background-color:#FFECDE;font-size: 1.3rem;align-self: center;padding: 0 5px;border-radius: 5px;">
                                НАСТАВНИЧЕСТВО
                            </div>
                        </div>
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav wizard-nav__auth d-flex d-flex justify-content-center pt-10 pt-lg-20 pb-5">
                            <!--begin::Wizard Steps-->
                            <div class="wizard-steps">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" <?php if(Route::is('register')): ?> data-wizard-state="current" <?php endif; ?>>
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon">
                                            <span class="wizard-number">1</span>
                                        </div>
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">Создание аккаунта</h3>
                                            <div class="wizard-desc">Введите данные от аккаунта</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" <?php if(Route::is('register.verify')): ?> data-wizard-state="current" <?php endif; ?>>
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon">
                                            <span class="wizard-number">2</span>
                                        </div>
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">Подтверждение регистрации</h3>
                                            <div class="wizard-desc">Подтвердите регистрацию путем ввода полученного СМС сообщения с кодом</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                            </div>
                            <!--end::Wizard Steps-->
                        </div>
                        <!--end: Wizard Nav-->
                    </div>
                </div>
                <div
                    class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto w-100">
                    <div class="d-flex flex-column-fluid flex-center">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layout.partials.kt-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo e(asset('plugins/global/plugins.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/custom/prismjs/prismjs.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('js/scripts.bundle.js')); ?>"></script>
        <!--end::Global Theme Bundle-->
        <script src="<?php echo e(asset('js/pages/crud/forms/widgets/input-mask.js')); ?>"></script>

        <?php echo \Livewire\Livewire::scripts(); ?>


        <?php echo $__env->yieldPushContent('scripts'); ?>


        <style>
            .wizard-2 .wizard-nav.wizard-nav__auth {
                align-self: center;
            }

            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step {
                padding: 1.8rem 1.5rem;
            }

            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step:not([data-wizard-state=current]) .wizard-label .wizard-title,
            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step:not([data-wizard-state=current]) .wizard-label .wizard-desc {
                color: #fff;
                opacity: .7;
            }

            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step[data-wizard-state=current] .wizard-label .wizard-title {
                color: var(--primary);
            }

            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step .wizard-label .wizard-title {
                font-weight: bold;
                font-size: 1.3rem;
            }

            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step .wizard-number {
                font-weight: bold;
                font-size: 2rem;
                margin-right: 10px;
            }

            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step:not([data-wizard-state=current]) .wizard-number {
                color: #fff;
                opacity: .7;
            }

            .wizard.wizard-2 .wizard-nav.wizard-nav__auth .wizard-steps .wizard-step[data-wizard-state=current] .wizard-number {
                color: var(--primary);
            }

            .alert.alert-custom.alert-danger {
                background-color: var(--primary);
                border-color: var(--primary);
            }

            @media (max-width: 991.98px) {
                .wizard.wizard-2 .wizard-nav.wizard-nav__auth {
                    width: calc(100% - 30px);
                }
            }
        </style>
    </body>
</html>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/layout/register.blade.php ENDPATH**/ ?>