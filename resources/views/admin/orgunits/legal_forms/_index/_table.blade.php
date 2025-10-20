<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('admin.orgunits.legal_forms._index._table-head')
        @include('admin.orgunits.legal_forms._index._table-body')
    </table>

    <x-tables.pagination :items="$legalForms"></x-tables.pagination>
</div>
