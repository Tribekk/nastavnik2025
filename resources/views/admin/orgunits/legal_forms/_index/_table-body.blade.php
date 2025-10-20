<tbody class="datatable-body">
@foreach($legalForms as $index => $legalForm)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $legalForms->firstItem() + $index }}
        </td>

        <td>
            <div class="d-flex align-items-center">
                <div class="ml-4">
                    <a href="{{ route('admin.orgunits.legal_forms.edit', $legalForm) }}" class="font-weight-bolder link">
                        {{ $legalForm->title }}
                    </a>
                </div>
            </div>
        </td>

        <td class="" style="vertical-align: middle;">
            @if($legalForm->disabled_at)
                <div class="text-primary mb-0">Нет, с:<br>{{ (new \Carbon\Carbon($legalForm->disabled_at))->format('d.m.Y') }}</div>
            @else
                <div class="text-success mb-0">Да</div>
            @endif
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $legalForm->created_at->format('d.m.Y') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $legalForm->updated_at->format('d.m.Y') }}</div>
        </td>

    </tr>
@endforeach
</tbody>
