<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('events.user.invites._index._table-head')
        @include('events.user.invites._index._table-body')
    </table>

    <x-tables.pagination :items="$invites"></x-tables.pagination>
</div>
