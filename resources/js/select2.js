/**
 * Функция инициализации Select2
 *
 * @function initSelect2
 * @param id - id элемента
 * @param placeholder - placeholder элемента
 * @param event - название event`а по обновлению значения
 * @param url - url для получения списка элементов
 * @param selectedUrl - url для получения выбранного элемента при обновлении страницы
 * @param selected - код текущего элемента
 * @param processCallback - callback инициализации эл-ов поиска - возвращает results свойство с эл-ми
 * @param optionCallback - callback инициализации текущего элемента - возвращает Option
 */
function initSelect2(id, placeholder, event, url, selectedUrl, selected, processCallback, optionCallback) {
    console.debug('initSelect2', arguments)

    $(`#${id}`).find('option').remove()
    $(`#${id}`).select2({
        placeholder,
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
            url,
            dataType: 'json',
            data: function (params) {
                var query = {
                    q: params.term,
                }
                return query;
            },
            processResults: function (response) {
                if(processCallback) return processCallback(response);
                return {
                    results: response.data
                };
            }
        },
    });

    if(!!selected) {
        $.ajax(`${selectedUrl}/${selected}`)
            .then(function (response) {
                var newOption = optionCallback ?
                    optionCallback(response) :
                    new Option(response.title, response.id, true, true);

                $(`#${id}`).append(newOption).trigger('change');
            })
    }

    $(`#${id}`).off('change');
    $(`#${id}`).on('change', function (e) {
        window.livewire.emit(event, e.target.value)
    });
}

export { initSelect2 };
