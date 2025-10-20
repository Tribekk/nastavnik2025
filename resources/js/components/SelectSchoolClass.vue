<template>
    <div>
        <div class="form-group">
            <label for="school_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите компанию</label>
            <select name="school_id" id="school_id" style="width: 100%;"></select>
        </div>
        <div class="form-group">
            <label for="class_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите  структурное подразделение</label>
            <select name="class_id" id="class_id" style="width: 100%;"></select>
        </div>
    </div>
</template>

<script>
require('select2/dist/js/select2.full.js');

export default {
    name: "SelectSchoolClass",
    props: ['school_id', 'class_id'],
    data() {
        return {
            schoolId: this.school_id,
            classId: this.class_id,
        };
    },
    methods: {
        initSelect2(findElem, placeholder, url) {
            $(findElem).select2({
                placeholder: placeholder,
                allowClear: true,
                ajax: {
                    url: url,
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    processResults: function (response) {
                        return {
                            results: response.data
                        };
                    }
                },
            });
        },
        setSelected(findElem, url, selected) {
            $.ajax(`${url}/${selected}`)
                .then(function (response) {
                    $(`#${findElem}`).clear();
                    var newOption = new Option(response.title, response.id, true, true);
                    $(`#${findElem}`).append(newOption).trigger('change');
                })
        }
    },
    mounted() {
        this.initSelect2("#school_id", "Выберите компанию", "/admin/schools");
        this.initSelect2("#class_id", "Выберите  структурное подразделение", "/admin/schools");
        this.setSelected("#school_id", "/admin/schools", 1)
    },
}
</script>
