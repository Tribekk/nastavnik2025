<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('consultations._index._table-head')
        @include('consultations._index._table-body')
    </table>

    <x-tables.pagination :items="$consultations"></x-tables.pagination>
</div>
