<div>



    <div wire:ignore>
        <div class="accordion" id="accordion-tmp-sms"></div>
        <button type="button" class="btn btn-info" id="repeatDivBtn" data-increment="1">Добавить шаблон</button>
    </div>

    <form  wire:submit.prevent="updateUserTmpSms" class="update-user-tmp-sms">
         <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Сохранить</button>
    </form>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>


        document.addEventListener('livewire:load', function () {

            $(document).on('click', '.removeDivBtn', function () {

                $divId = $(this).data("id");
                $("#" + $divId).remove();
                setTmpSms();
                // $inc = $("#repeatDivBtn").data("increment");
                // $("#repeatDivBtn").data("increment", $inc-1);

            });

            function setTmpSms() {
            window.livewire.find('<?php echo e($_instance->id); ?>').call('setUserTmpSms', $('#accordion-tmp-sms').find('textarea, input').serializeArray());
            }

            $('.update-user-tmp-sms').on('click', function () {
                setTmpSms();
            });

            function addItemTmpSms(zag_sms='', text_sms='', url_sms='') {
                $button_add = $("#repeatDivBtn");
                $newid = $button_add.data("increment");// id у кнопки добавления

                let item_tmp_sms = '<div class="accordion-item repeatDiv" id="repeatDiv_' + $newid + '">' +
                    '<div>' +
                    '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' + $newid + '" aria-expanded="false" aria-controls="collapse' + $newid + '">' +
                    '<input id="tmp_sms_zag' + $newid + '" type="text" name="tmp_sms[' + $newid + '][zag]" value="' + zag_sms + '" class="form-control tmp-sms-zag" placeholder="Заголовок">' +
                    '</button>' +
                    '</div>' +
                    '<div id="collapse' + $newid + '" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordion-tmp-sms">' +
                    '<div class="accordion-body">' +
                    '<textarea id="tmp_sms_text' + $newid + '" class="form-control tmp-sms-text" name="tmp_sms[' + $newid + '][text]" placeholder="Введите текст сообщения">' + text_sms + '</textarea>' +
                    '<input id="tmp_sms_url' + $newid + '" type="text" name="tmp_sms[' + $newid + '][url]" value="' + url_sms + '" class="form-control tmp-sms-url" placeholder="url">' +
                    '</div>' +
                    '</div>' +

                    '<div class="input-group-append"><button type="button" class="btn btn-primary removeDivBtn" data-id="repeatDiv_' + $newid + '">Удалить</button></div>' +
                    '</div>';

                $(item_tmp_sms).appendTo('#accordion-tmp-sms');

                $newid++;
                $button_add.data("increment", $newid);

                setTmpSms();
            }

            $("#repeatDivBtn").click(function () {

                addItemTmpSms()
            });

        window.livewire.find('<?php echo e($_instance->id); ?>').call('getUserTmpSms').then(function ($tmp_sms) {
            $tmp_sms.forEach(function (tmp, i) {
                addItemTmpSms(tmp['zag'], tmp['text'], tmp['url'])
            });

        });


            // Set the value of the "count" property


            // Call the increment component action


        });

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/livewire/user/profile/tmp-sms.blade.php ENDPATH**/ ?>