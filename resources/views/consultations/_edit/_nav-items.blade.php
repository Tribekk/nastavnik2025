<ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
    <li class="nav-item mr-3">
        <a class="nav-link active" data-toggle="tab" href="#consultation-tab">
            <span class="nav-icon">
                <i class="la la-headphones"></i>
            </span>
            <span class="nav-text font-size-lg">{{ __('Консультация') }}</span>
        </a>
    </li>
    <li class="nav-item mr-3">
        <a class="nav-link" data-toggle="tab" id="nav-report-tab" href="#report-tab">
            <span class="nav-icon">
                <i class="la la-chart-pie"></i>
            </span>
            <span class="nav-text font-size-lg">{{ __('Отчет') }}</span>
        </a>
    </li>
</ul>

@push('scripts')
    <script>
        $(document).ready(function () {
            if(window.location.hash == "#report-tab") {
                $('#nav-report-tab').click();
            }
        });
    </script>
@endpush
