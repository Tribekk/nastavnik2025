function sendSmsDialog(phone) {
    const inputPhone = phone ? '' :
        '<div class="form-group text-left">' +
        '<label for="swal-sms__phone" class="font-size-h6 font-weight-bolder text-dark required">Введите номер телефона</label>' +
        '<input name="swal-sms__phone" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal-sms__phone" placeholder="Телефон" type="tel"></input>' +
        '</div>';

    const inputMessage =
        '<div class="form-group text-left">' +
        '<label for="swal-sms__message" class="font-size-h6 font-weight-bolder text-dark required">Введите текст SMS сообщения</label>' +
        '<textarea name="swal-sms__message" style="resize: none" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal-sms__message" placeholder="Сообщение" rows="6"></textarea>' +
        '</div>';

    Swal.fire({
        title: '<h2 class="font-weight-bold font-size-h3 p-0 mb-5 font-hero">Отправка SMS сообщения</h2>',
        html: inputPhone + inputMessage,
        confirmButtonColor: 'var(--success)',
        confirmButtonText: 'Отправить',
        showCancelButton: true,
        cancelButtonText: 'Закрыть',
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        width: 600,
        onOpen: () => {
            if(!phone) {
                $('#swal-sms__phone').inputmask("+7 (999) 999 99 99");
            }
        },
        preConfirm: () => {
            const phoneElem = document.getElementById('swal-sms__phone');
            if(phoneElem) phone = phoneElem.value;

            const message = document.getElementById('swal-sms__message').value;

            return $.post(`/iq_sms/send`, {
                phone,
                message,
            }).then(response => {
                Swal.fire({
                    icon: 'success',
                    title: 'Успешно',
                    confirmButtonColor: 'var(--success)',
                    html: `Вы успешно отправили сообщение пользователю на номер: <span id="swal-result-phone">${phone}</span>.`,
                    onOpen: () => {
                        $('#swal-result-phone').inputmask("+7 (999) 999 99 99");
                    },
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

export { sendSmsDialog };
