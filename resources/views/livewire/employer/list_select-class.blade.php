<div>
    <livewire:school.select-school-class></livewire:school.select-school-class>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.livewire.on('setSchoolId', e => {
                @this.set('schoolId', e);
                @this.set('classId', null);
            });

            window.livewire.on('setClassId', e => {
                 @this.call("setClass", e);
            });
        });
    </script>
@endpush
