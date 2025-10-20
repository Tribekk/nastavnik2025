@if ($status)
    <div class="row">
        <x-alert type="outline-success w-100" icon="la la-check" :text="$status" />
    </div>
@endif
