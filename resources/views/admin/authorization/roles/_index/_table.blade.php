<div class="table-responsive-md">
    <table class="table lk-table">
        @include('admin.authorization.roles._index._table-head')
        @include('admin.authorization.roles._index._table-body')
    </table>

    <x-tables.pagination :items="$roles"></x-tables.pagination>
</div>
