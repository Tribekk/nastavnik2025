<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('events._participants._table-head')
        @include('events._participants._table-body')
    </table>

    <x-tables.pagination :items="$participants"></x-tables.pagination>
</div>
