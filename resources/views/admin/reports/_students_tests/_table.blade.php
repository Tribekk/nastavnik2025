<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.reports._students_tests._table-head')
        @include('admin.reports._students_tests._table-body')
    </table>

    <x-tables.pagination :items="$results"/>
</div>
