<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.users._index._table-head')
        @include('admin.users._index._table-body')
    </table>

    <x-tables.pagination :items="$users"></x-tables.pagination>
</div>
