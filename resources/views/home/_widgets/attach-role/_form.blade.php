<h3 class="font-weight-bolder mb-5 font-pixel font-orange">{{ __('Выберите свою роль') }}</h3>
<ul class="dashboard-tabs nav nav-pills nav-primary row row-paddingless m-0 p-0 flex-row justify-content-around mt-10">

    <li class="nav-item d-flex col-2 mb-3 mb-lg-0 min-w-200px">
        <a class="nav-link  py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="{{ route('attach.student', ['sex' => 1]) }}">
            <span class="nav-icon py-2 w-auto">
                <span class="svg-icon svg-icon-3x">
                    <img src="{{ asset('img/boy.png') }}" style="height: 120px"/>
                </span>
            </span>
            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                <span class="label label-lg label-pill label-inline mr-2 font-hero bg-grey-light font-size-lg text-uppercase bg-gray-light text-white ">
                    {{ __('Я наставник') }}
                </span>
            </span>
        </a>
    </li>

<!--     <li class="nav-item d-flex col-2 mb-3 mb-lg-0 min-w-200px">
        <a class="nav-link  py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="{{ route('attach.student', ['sex' => 2]) }}">
            <span class="nav-icon py-2 w-auto">
                <span class="svg-icon svg-icon-3x">
                    <img src="{{ asset('img/girl.png') }}" style="height: 120px"/>
                </span>
            </span>
            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                <span class="label label-lg label-pill label-inline mr-2 font-hero bg-grey-light font-size-lg text-uppercase bg-gray-light text-white ">
                    {{ __('Я ученица') }}
                </span>
            </span>
        </a>
    </li> -->
    <li class="nav-item d-flex col-2 flex-grow-1 mb-3 mb-lg-0 min-w-200px">
        <a class="nav-link  py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="{{ route('attach.teacher') }}">
            <span class="nav-icon py-2 w-auto">
                <span class="svg-icon svg-icon-3x">
                    <img src="{{ asset('img/organizer.png') }}" style="height: 120px"/>
                </span>
            </span>
            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                <span class="label label-lg label-pill label-inline mr-2 font-hero bg-grey-light font-size-lg text-uppercase bg-gray-light text-white ">
                    {{ __('Я Куратор') }}
                </span>
            </span>
        </a>
    </li>
    <li class="nav-item d-flex col-2 flex-grow-1 mb-3 mb-lg-0 min-w-200px">
        <a class="nav-link  py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="{{ route('attach.employer') }}">
            <span class="nav-icon py-2 w-auto">
                <span class="svg-icon svg-icon-3x">
                    <img src="{{ asset('img/teachers.png') }}" style="height: 120px"/>
                </span>
            </span>
            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                <span class="label label-lg label-pill label-inline mr-2 font-hero bg-grey-light font-size-lg text-uppercase bg-gray-light text-white ">
                    {{ __('Я HR') }}
                </span>
            </span>
        </a>
    </li>
<!--     <li class="nav-item d-flex col-2 flex-grow-1 mb-3 mb-lg-0 min-w-200px">
        <a class="nav-link  py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="{{ route('attach.parent') }}">
            <span class="nav-icon py-2 w-auto">
                <span class="svg-icon svg-icon-3x">
                    <img src="{{ asset('img/parents.png') }}" style="height: 120px"/>
                </span>
            </span>
            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                <span class="label label-lg label-pill label-inline mr-2 font-hero bg-grey-light font-size-lg text-uppercase bg-gray-light text-white ">
                {{ 'Я родитель' }}
                </span>
                <span class="d-block"> {{ __('Законный представитель') }}</span>
            </span>
        </a>
    </li> -->
</ul>
