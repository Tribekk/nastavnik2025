<div class="tab-pane show px-7" id="roles-tab" role="tabpanel">
    <div class="py-3">
        @if ($errors->any())
            <div class="alert alert-custom alert-light-danger">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">{{ $errors->first() }}</div>
            </div>
        @endif
    </div>

    <livewire:users.create-user-form-roles></livewire:users.create-user-form-roles>
</div>
