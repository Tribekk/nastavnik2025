<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('events.user._index._table-head')
        @include('events.user._index._table-body')
    </table>

    <x-tables.pagination :items="$events"></x-tables.pagination>
</div>
