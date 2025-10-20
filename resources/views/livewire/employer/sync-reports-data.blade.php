<div class="text-center">
    <button id="sync-data-btn" wire:target="syncData" class="btn btn-outline-success py-2 my-1 mr-1" wire:loading.attr="disabled" wire:loading.class.remove="px-4" wire:loading.class="pl-4 pr-14 disabled spinner spinner-track spinner-success spinner-right">
        <i class="la la-sync"></i>
        {{ __('Обновить данные') }}
    </button>

    <script>
        function sendToExcel() {
            document.getElementById('form_table_1').action="{{ route('employer.reports.students.generate_excel') }}";
           /// alert(document.getElementById('form_table_1'));
            document.getElementById('form_table_1').submit();
        }
    </script>

    <button  class="btn btn-outline-success py-2 my-1 mr-1" onClick="sendToExcel()">

        {{ __('Выгрузка в Excel') }}
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <button id="generate-pdf" class="btn btn-outline-success py-2 my-1 mr-1">

        {{ __('Выгрузка в pdf') }}
    </button>

    <div class="text-muted" style="font-size: .9rem;">{{ $label }}</div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#sync-data-btn").click(function (e) {
                e.preventDefault();

                Swal.fire({
                    icon: 'warning',
                    title: 'Обновление данных',
                    text: 'Вы действительно хотите выполнить обновление данных? Это займет примерно 3 минуты. Данные автоматически обновляются каждый час.',
                    confirmButtonColor: 'var(--success)',
                    confirmButtonText: 'Выполнить',
                    showCancelButton: true,
                    cancelButtonColor: 'var(--primary)',
                    cancelButtonText: 'Отменить',

                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('syncData');
                    }
                });
            });

            $('#generate-pdf').on('click', function () {
                let element = $('#responsive-table table')[0];

                var opt = {
                    margin: [-400, 0, 0, 0],
                     image:        { type: 'jpeg', quality: 1 },
                    jsPDF:  { unit: 'px', format: [element.offsetHeight, element.offsetWidth], orientation: 'landscape' }
                };

                html2pdf()
                    .set(opt)
                    .from(element)
                    .save();
            });


        });
    </script>
@endpush
