<div style="margin-bottom: 25px; white-space: nowrap; page-break-inside:avoid;">
    <h4 class="font-size-h5" style="width: 100%; display: inline-block; margin-bottom: 0;">
        <span class="text-dark-50 font-weight-normal">{{ $title }} (родители: {{ $valueParent }} / {{ $percentageParent }}%, дети: {{ $valueChild }} / {{ $percentageChild }}%)</span>
    </h4>

    <div class="progress" style="border-radius: 8px; margin-top: 0;">
        <div class="progress-bar progress-green" role="progressbar" style="border-radius: 0; width: {{ $percentageParent }}%"></div>
        <div class="progress-bar progress-light-green" role="progressbar" style="border-radius: 0; left: {{ $percentageParent }}%; width: {{ $percentageChild }}%"></div>
    </div>
</div>
