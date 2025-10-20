<div class="table-responsive-md">
    <table class="table lk-table">
        @include('admin.authorization.permissions._index._table-head')
        @include('admin.authorization.permissions._index._table-body')
    </table>

    <x-tables.pagination :items="$permissions"></x-tables.pagination>
</div>
