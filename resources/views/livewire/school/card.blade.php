<div class="card card-custom">
    <div class="card-header">
        <div class="card-title font-weight-bold font-size-h3 text-primary">
            {!! $school->short_title !!}
        </div>
    </div>
    <div class="card-body">
        <p><b>Тип организации:</b> {{ $school->typeEducationOrganization->title }}</p>
        <p><b>Основание взаимодействия /  Номер договора:</b> {{ $school->number }}</p>
        @if($school->director)
            <p><b>ФИО директора:</b>  {{ $school->director }}</p>
        @endif
        @if($school->phone)
            <p><b>Телефон:</b>  {{ $school->phone }}</p>
        @endif
        @if($school->email)
            <p><b>Почта:</b>  {{ $school->email }}</p>
        @endif
        <hr>
        <p><b>Руководители структурных подразделений:</b></p>
        @forelse($classes as $class)
            <div>
                {{ $class->number }}{{$class->letter}} (год: {{ $class->year ?? 'не указан' }}) -

                @if(Auth::user()->hasRole('teacher'))
                    {{ Auth::user()->fullName }}
                @else
                    @forelse($class->curators as $curator)
                        {{ $curator->user->fullName }}{{ !$loop->last ? ', ' : '.' }}
                    @empty
                        <span class="text-muted">На данный момент нет руководителя.</span>
                    @endforelse
                @endif
            </div>
        @empty
            <span class="text-muted">На данный момент структурные подразделения отсутствуют{{ Auth::user()->hasRole('teacher') ? " или вы не являетесь руководителем структурного подразделения(ов)" : '' }}.</span>
        @endforelse
    </div>
</div>
