$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

import { initSelect2 } from './select2'
window.initSelect2 = initSelect2;

import { sendSmsDialog } from "./sendSmsDialog";
$.sendSmsDialog = sendSmsDialog;
