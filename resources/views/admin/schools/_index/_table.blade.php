<div class="table-responsive-md">
    <table class="table lk-table">
        @include('admin.schools._index._table-head')
        @include('admin.schools._index._table-body')
    </table>

    <x-tables.pagination :items="$schools"></x-tables.pagination>
</div>
