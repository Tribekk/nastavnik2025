<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.orgunits.activity_kinds._index._table-head')
        @include('admin.orgunits.activity_kinds._index._table-body')
    </table>

    <x-tables.pagination :items="$activityKinds"></x-tables.pagination>
</div>
