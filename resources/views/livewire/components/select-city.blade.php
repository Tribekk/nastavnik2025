<div>
    <select id="{{ $select_id }}" name="{{ $name }}" style="width: 100%;">

    </select>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#{{ $select_id }}').select2({
                placeholder: '{{ $placeholder }}',
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
                        let items = response.data;

                        for(let i = 0; i < items.length; i++) {
                            items[i] = {
                                id: items[i].text,
                                text: items[i].text,
                            };
                        }

                        return {
                            results: items
                        };
                    }
                },
            });

            @if($selected)
            $.ajax('{{ $selectedItemUrl }}/{{ $selected }}')
                .then(function (response) {
                    var newOption = new Option(response.title, response.title, true, true);
                    $('#{{ $select_id }}').append(newOption).trigger('change');
                })
            @endif

            $('#{{ $select_id }}').on('change', function (e) {
                window.livewire.emit('{{ $event }}', e.target.value)
            });
        });
    </script>
@endpush
