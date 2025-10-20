<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('events._index._table-head')
        @include('events._index._table-body')
    </table>

    <x-tables.pagination :items="$events"></x-tables.pagination>
</div>
