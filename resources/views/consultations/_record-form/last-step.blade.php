<div class="pb-5" data-wizard-type="step-content" @if($step == "last") data-wizard-state="current" @endif>
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

    <x-inputs.text-area title="Есть ли у Вас какие-то пожелания или вопросы до консультации?"
                        model="wishes_and_questions"
                        name="wishes_and_questions" id="wishes_and_questions"/>
</div>
