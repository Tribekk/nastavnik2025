<div class="my-5">
    <x-inputs.input-text-v id="attached_files" name="attached_files[]" multiple type="file" title="Прикрепить файлы" accept=".pdf"/>
    <div class="mt-10 border p-4">
        <h4 class="font-weight-bold font-size-h4">Прикрепленные файлы</h4>

        <div class="px-2">
            @forelse($files as $file)
                <div class="font-size-h6">
                    <div class="d-inline-block text-break my-1">{{ $file->onlyFileName }}</div>
                    <div class="button-group ml-sm-2 my-1 d-sm-inline-block">
                        <button wire:click.prevent="deleteFile({{$file->id}})" class="btn btn-danger btn-icon btn-xs">
                            <i class="la la-remove"></i>
                        </button>
                        <a href="{{ $file->url }}" target="_blank" class="btn btn-success btn-xs btn-icon">
                            <i class="la la-eye"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="font-size-h6">Файлы не прикреплены</div>
            @endforelse
        </div>
    </div>
</div>
