<tbody class="datatable-body">
@foreach($orgunits as $index => $orgunit)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $orgunits->firstItem() + $index }}
        </td>

        <td>
            <div class="d-flex align-items-center min-w-225px max-w-225px">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="{{ $orgunit->logoUrl }}">
                </div>
                <div class="ml-4">
                    <a href="{{ route('admin.orgunits.edit', $orgunit) }}" class="font-weight-bolder link text-break">
                        {{ $orgunit->title }}
                    </a>
                </div>
            </div>
        </td>

        <td>
            <div class="d-flex align-items-center min-w-225px max-w-225px">
                @if($orgunit->parent)
                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                        <img src="{{ $orgunit->parent->logoUrl }}">
                    </div>
                    <div class="ml-4">
                        <a href="{{ route('admin.orgunits.edit', $orgunit->parent) }}" class="font-weight-bolder link text-break">
                            {{ $orgunit->parent->title }}
                        </a>
                    </div>
                @else
                    <div class="text-dark-75 mt-2 font-size-lg mb-0">Нет родительской организации</div>
                @endif
            </div>
        </td>

        <td class="">
            <div class="mb-0">{{ $orgunit->legalForm->title }}</div>
        </td>

        <td class="">
            @foreach($orgunit->activityKinds as $activityKind)



                <div> @php

                        if($activityKind->activityKind!=null) {
                            echo $activityKind->activityKind->title;
                        } else {
                            echo "null";
                        }

                    @endphp</div>
            @endforeach
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $orgunit->created_at->format('d.m.Y') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $orgunit->updated_at->format('d.m.Y') }}</div>
        </td>

    </tr>
@endforeach
</tbody>
