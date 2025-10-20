<div style="margin-bottom: 25px;">
    <h4 class="font-size-h5" style="width: 100%; display: inline-block;">
        <span class="text-dark-50 font-weight-normal">
            {{ $title }} ({{ $value }} / {{ $percentage }}%)
        </span>
    </h4>

    <div class="progress" style="border-radius: 8px; margin-top: 8px;">
        <div class="progress-bar {{ $color ?? 'progress-blue' }}" role="progressbar" style="border-radius: 0; width: {{ $percentage }}%"></div>
    </div>
</div>
