<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('results._student-questionnaire._table-head')
        @include('results._student-questionnaire._table-body')
    </table>

    <x-tables.pagination :items="$users"></x-tables.pagination>
</div>
