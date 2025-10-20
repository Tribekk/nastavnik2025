<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('events.audience._index._table-head')
        @include('events.audience._index._table-body')
    </table>

    <x-tables.pagination :items="$audience"></x-tables.pagination>
</div>
