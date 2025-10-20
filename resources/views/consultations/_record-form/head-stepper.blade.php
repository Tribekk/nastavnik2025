<div class="wizard-nav border-bottom">
    <div class="wizard-steps p-8 p-lg-10 font-hero">
        <div class="wizard-step" data-wizard-type="step" @if($step == 'first') data-wizard-state="current" @endif>
            <div class="wizard-label">
                <i class="wizard-icon la la-clock"></i>
                <h3 class="wizard-title">Выбор времени</h3>
            </div>
            <span class="svg-icon svg-icon-xl wizard-arrow">
                    <i class="la la-arrow-right"></i>
                </span>
        </div>

        <div class="wizard-step" data-wizard-type="step" @if($step == 'second') data-wizard-state="current" @endif>
            <div class="wizard-label">
                <i class="wizard-icon la la-user"></i>
                <h3 class="wizard-title">Выбор консультанта</h3>
            </div>
            <span class="svg-icon svg-icon-xl wizard-arrow">
                    <i class="la la-arrow-right"></i>
                </span>
        </div>

        <div class="wizard-step" data-wizard-type="step" @if($step == 'last') data-wizard-state="current" @endif>
            <div class="wizard-label">
                <i class="wizard-icon la la-headphones"></i>
                <h3 class="wizard-title">Формат консультации</h3>
            </div>
        </div>
    </div>
</div>
