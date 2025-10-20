<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('events.directions._index._table-head')
        @include('events.directions._index._table-body')
    </table>

    <x-tables.pagination :items="$directions"></x-tables.pagination>
</div>
