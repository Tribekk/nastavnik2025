<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.reports._students._table-head')
        @include('admin.reports._students._table-body')
    </table>

    <x-tables.pagination :items="$users"></x-tables.pagination>
</div>
