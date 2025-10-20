<div>
    <select id="{{ $select_id }}" name="{{ $name }}" @if($multiple) multiple="multiple" @endif style="width: 100%;">

    </select>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#{{ $select_id }}').select2({
                placeholder: '{{ $placeholder ?? 'Поиск' }}',
                allowClear: true,
                language: {
                    noResults: function(){
                        return "Нет результатов";
                    },
                    errorLoading: function(){
                        return "Не удалось загрузить";
                    },
                },
                ajax: {
                    url: '{{ $url }}',
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    processResults: function (response) {
                        return {
                            results: response.data
                        };
                    }
                },
            });

            @if($selected)
            $.ajax('{{ $selectedItemUrl }}/{{ $selected }}')
                .then(function (response) {
                    if(!(response instanceof Array)) {
                        response = [response];
                    }

                    response.forEach(item => {
                        var newOption = new Option(item.title, item.id, true, true);
                        $('#{{ $select_id }}').append(newOption).trigger('change');
                    });
                })
            @endif

            $('#{{ $select_id }}').on('change', function (e) {
                window.livewire.emit('{{ $event }}', e.target.value)
            });
        });
    </script>
@endpush
