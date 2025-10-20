<?php

namespace App\Livewire\Consultations;

use Domain\Consultation\Models\Consultation;
use Domain\Consultation\Models\ConsultationResult;
use Domain\Consultation\Models\ConsultationResultType;
use Domain\Consultation\Models\ConsultationResultValue;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Report extends Component
{
    public Consultation $consultation;
    public ConsultationResult $result;
    public $values;

    protected $rules = [
        'result.recommend' => 'nullable',
        'result.agree' => 'nullable',

        "values.*.uuid" => 'nullable',
        "values.*.type_id" => 'nullable',
        "values.*.comment" => 'nullable|string|max:4096',
        "values.*.comment_for_result" => 'nullable|string|max:4096',
        "values.*.conformity_type" => 'nullable|string|max:191',
    ];

    protected $attributes = [
        "values.*.comment" => "«комментарии, вопросы, гипотезы, уточнения»",
        "values.*.comment_for_result" => "«комментарии по итогу»",
        "values.*.conformity_type" => "«соответствие типажу»",
    ];

    public function mount($consultation)
    {
        $this->consultation = $consultation;
        $this->result = $consultation->result ?? new ConsultationResult([
            'recommend' => 'recommend',
            'agree' => 'agree',
        ]);

        $types = ConsultationResultType::all();

        if(empty($this->result->values) || !count($this->result->values)) {
            $this->values = new Collection();
            foreach ($types as $type) {
                $this->values->add(new ConsultationResultValue([
                    'type_id' => $type->id,
                ]));
            }
        } else {
            $this->values = $this->result->values;
        }
    }

    public function render()
    {
        return view('livewire.consultations.report');
    }

    public function type($value)
    {
        return $value->type ?? ConsultationResultType::find($value['type_id']);
    }

    public function save()
    {
        try {
            $params = $this->validateAll();

            $result = DB::transaction(function () use ($params) {
                if($this->consultation->result) {
                    $this->consultation->result->update($params['result']);
                    $result = $this->consultation->result;
                } else {
                    $data = array_merge($params['result'], ['uuid' => Str::uuid()]);
                    $result = $this->consultation->result()->create($data);
                }

                foreach ($params['values'] as $value) {
                    if(!isset($value['uuid'])) {
                        $value['uuid'] = Str::uuid();
                    }

                    ConsultationResultValue::updateOrCreate([
                        'result_id' => $result->id,
                        'type_id' => $value['type_id'],
                    ], $value);
                }

                return true;
            });

            if($result) {
                $this->dispatchBrowserEvent('show-message', [
                    'title' => __('Отчет успешно сохранен'),
                    'text' => __('Внимание! Информация о консультации сохраняется отдельно, во вкладке консультация.'),
                    'icon' => 'success'
                ]);

            } else {
                $this->dispatchBrowserEvent('show-message', [
                    'title' => __('Неизвестная ошибка'),
                    'text' => __('Не удалось сохранить отчет'),
                    'icon' => 'error'
                ]);
            }
        } catch (ValidationException $exception) {
            $errors = $exception->errors();
            $key = array_key_first($errors);

            try {
                $segments = explode(".", $key);
                $type = $this->type($this->values[$segments[1]]);
            } catch (Exception $exception) {
                $type = null;
            }

            $this->dispatchBrowserEvent('show-message', [
                'title' => __('Форма отчета заполнена неверно'),
                'text' => ($type ? $type->title . ". " : '') . $errors[$key][0],
                'icon' => 'error'
            ]);

            throw new ValidationException($exception->validator);
        }
    }

    protected function validateAll() {
        return $this->validate($this->rules, [], $this->attributes);
    }
}
