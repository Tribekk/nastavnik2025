@extends('layout.pdf')

@section('content')
    @include('employer.reports._students._pdf.stages-screen')

    @if(isset($proposedAdmission) || isset($appliedAdmission) || isset($enrolledProfileUZ) || isset($concludedTargetAgreement))
        @include('employer.reports._students._pdf.selection-results-screen')
    @endif

    <style>
        .progress-silver {
            background: #BFBFBF;
        }

        .progress-orange {
            background: #FAB500;
        }

        .progress-light-green {
            background: #92D051;
        }

        .progress-green {
            background: #00B050;
        }

        .progress-blue {
            background: #385E9D;
        }
    </style>
@endsection
