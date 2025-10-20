<tbody class="datatable-body">
@foreach($schools as $index => $school)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $schools->firstItem() + $index }}
        </td>

        <td>
            <a href="{{ route('admin.schools.edit', $school) }}" class="font-weight-bolder link">
               {{ $school->short_title ?? '-' }}
            </a>
        </td>

        <td class="text-left" style="vertical-align: middle;">
            <b>
                {{ $city->first()->where('code', substr($school->local, 0, 2) . "00000000000")->value('name')  }}
                {{ $city->first()->where('code', substr($school->local, 0, 2) . "00000000000")->value('socr')  }}  
                {{ $city->first()->where('code', $school->local)->value('name')  }} {{ $city->first()->where('code', $school->local)->value('socr')  }}</b>   {{ $school->address }} 
        </td>

         

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $school->created_at->format('d.m.Y') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $school->updated_at->format('d.m.Y') }}</div>
        </td>

    </tr>
@endforeach
</tbody>
