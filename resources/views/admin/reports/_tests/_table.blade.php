<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.reports._tests._table-head')
        @include('admin.reports._tests._table-body')
    </table>

    <x-tables.pagination :items="$results"></x-tables.pagination>
</div>
