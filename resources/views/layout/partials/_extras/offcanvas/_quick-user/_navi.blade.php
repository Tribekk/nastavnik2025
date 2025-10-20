<div class="navi navi-spacer-x-0 p-0">

    <a href="{{ route('user.edit') }}" class="navi-item">
        <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
                <div class="symbol-label">
                        <span class="svg-icon svg-icon-md svg-icon-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                 viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                        fill="#000000"/>
                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
                                </g>
                            </svg>
                        </span>
                </div>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">Мой профиль</div>
                <div class="text-muted">Настройки аккаунта</div>
            </div>
        </div>
    </a>
    @if(session()->has('admin_id'))
    <a href="{{ route('login_as_admin') }}" class="navi-item">
        <div class="navi-link">
            <div class="navi-text">
                <div class="font-weight-bold">Вернуться в аккаунт администратора</div>
            </div>
        </div>
    </a>
    @endif
</div>
