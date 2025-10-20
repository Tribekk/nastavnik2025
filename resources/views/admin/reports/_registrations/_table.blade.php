<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.reports._registrations._table-head')
        @include('admin.reports._registrations._table-body')
    </table>

    <x-tables.pagination :items="$registrations"></x-tables.pagination>
</div>
