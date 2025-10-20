<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.orgunits._index._table-head')
        @include('admin.orgunits._index._table-body')
    </table>

    <x-tables.pagination :items="$orgunits"></x-tables.pagination>
</div>
