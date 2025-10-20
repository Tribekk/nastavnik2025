<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.reports._student-questionnaires._table-head')
        @include('admin.reports._student-questionnaires._table-body')
    </table>

    <x-tables.pagination :items="$questionnaires"></x-tables.pagination>
</div>
