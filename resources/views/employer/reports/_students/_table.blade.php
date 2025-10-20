<div class="table-responsive" id="responsive-table">
    <table class="table lk-table" id="tttt">
        @include('employer.reports._students._table-head')
        @include('employer.reports._students._table-body')
    </table>

    <script>
        function save_personal_notes(user_id, type) {


            var note=document.getElementById('personal_notes_'+user_id + '_'+ type).value;


            $.ajax({
                url: '/orgunit/save_personal_notes',
                type: 'POST' ,
                data: {note:note,user_id:user_id, type:type},

            }).done(function(result)  {



            });
        }
    </script>

    <x-tables.pagination :items="$users"></x-tables.pagination>
</div>
