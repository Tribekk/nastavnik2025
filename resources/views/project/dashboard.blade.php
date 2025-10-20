@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    @if(Auth::user()->finishedDepthTests)
                        @include('student._dashboard.finish-tests-dashboard')
                    @elseif(Auth::user()->hasDepthTests())
                        @include('student._dashboard.depth-test-dashboard')
                   @else
                       @include('student._dashboard.base-test-dashboard')
                   @endif
                   </div>
               </div>
           </div>
       </div>
   @endsection
