<div class="table-responsive" id="responsive-table">
    <table class="table lk-table">
        @include('employer.students.list._list._table-head')
        @include('employer.students.list._list._table-body')
    </table>

    <x-tables.pagination :items="$students"></x-tables.pagination>
</div>
