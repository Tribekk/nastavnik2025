<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.reports._attached_parents._table-head')
        @include('admin.reports._attached_parents._table-body')
    </table>

    <x-tables.pagination :items="$results"></x-tables.pagination>
</div>
