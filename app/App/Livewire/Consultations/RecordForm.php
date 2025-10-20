<?php

namespace App\Livewire\Consultations;

use Carbon\Carbon;
use Domain\Consultant\Models\ConsultantAppointmentInterval;
use Domain\Consultation\Actions\CreateConsultationAction;
use Domain\Consultation\Notifications\NewConsultationNotification;
use Domain\Consultation\Notifications\StudentInviteConsultationNotification;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RecordForm extends Component
{
    public $step = "first";

    public $date_at = '';
    public $timeIntervals = [];
    public $time_interval_id = '';

    public $children;
    public $child_id;
    public $parent_id;

    public $consultants = [];
    public $consultant_id = null;
    public $appointment_id = null;

    public $with_child = false;
    public $personal_communication_parent = false;
    public $personal_communication_child = false;
    public $separation_during_consultation = false;
    public $wishes_and_questions = "";
    public $way_of_communication = "zoom";


    protected $rules = [
        'child_id' => ['required', 'exists:users,id'],
        'date_at' => ['required', 'date', 'after:16.11.2020', 'before:30.12.2052'],
        'time_interval_id' => ['required', 'exists:consultants_appointment_time_intervals,id'],
        'consultant_id' => ['required', 'exists:users,id'],
        'wishes_and_questions' => ['nullable', 'max:5000'],
        'appointment_id' => ['unique:consultations'],
        'way_of_communication' => ['required', 'in:zoom,skype,whatsapp,irrelevant'],
    ];

    protected $messages = [
        'consultant_id.required' => 'Выбор консультанта обязателен',
        'appointment_id.unique' => 'Выбранное Вами день и время, у выбранного консультанта, уже забронированы',
        'way_of_communication.required' => 'Способ связи обязателен для выбора',
    ];

    protected $attributes = [
        "child_id" => "«ребенок»",
        "parent_id" => "«родитель»",
        "date_at" => "«день»",
        "time_interval_id" => "«время»",
        "consultant_id" => "«консультант»",
        "wishes_and_questions" => "«пожелания и вопросы»",
        "way_of_communication" => "«тип связи»",
    ];

    public function mount()
    {
        $this->children = [];

        $userIsChild = Auth::user()->hasRole('student');

        if(!$userIsChild) {
            $observed = Auth::user()->observedUsers()->get('observed_user_id')->pluck('observed_user_id');
            $users = User::whereIn('id', $observed)->get();

            foreach ($users as $user) {
                if($user->finishedDepthTests) {
                    $this->children[] = [
                        'title' => $user->fullName,
                        "value" => $user->id
                    ];
                }
            }
        }

        if($userIsChild) {
            $this->parent_id = null;
            $this->child_id = Auth::id();
        } else {
            if(count($this->children)) {
                $this->child_id = $this->children[0]['value'];
            } else {
                $this->child_id = '';
            }

            $this->parent_id = Auth::id();
        }

        $this->takeTimeIntervals();
    }

    public function render()
    {
        return view('livewire.consultations.record-form');
    }

    public function storeRecord()
    {
        if(Auth::user()->hasRole('student') && !Auth::user()->finishedDepthTests) {
            return true;
        }

        $data = $this->validateAll();
        $data = array_merge($data, [
            'with_child' => $this->with_child,
            'personal_communication_parent' => $this->personal_communication_parent,
            'personal_communication_child' => $this->personal_communication_child,
            'separation_during_consultation' => $this->separation_during_consultation,
            'appointment_id' => $this->appointment_id,
            'communication_type' => $this->way_of_communication,
        ]);

        $action = new CreateConsultationAction();
        $consultation = $action->run(Auth::user(), $data);

        try {
            $consultation->consultant->notify(new NewConsultationNotification($consultation));
        } catch (\Exception $exception) {
            Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
        }

        try {
            if(Auth::user()->hasRole('parent')) {
                $consultation->child->notify(new StudentInviteConsultationNotification($consultation));
            }
        } catch (\Exception $exception) {
            Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
        }

        return $this->redirect(route('consultations.show', $consultation));
    }

    public function takeTimeIntervals()
    {
        if($this->date_at) {
            $this->time_interval_id = '';
            $this->timeIntervals = [];
            $this->consultants = [];
            $this->consultant_id = null;
            $this->appointment_id = null;

            $appointments = ConsultantAppointmentInterval::query()
                    ->doesntHave('consultation')
                    ->where('date_at', $this->date_at)->get() ?? [];

            $uniqueAppointments = $appointments->unique('time_interval_id')
                ->sortBy(function ($appointment, $key) {
                    return (new Carbon($appointment->interval->start_at))->toDateTime();
                });

            foreach ($uniqueAppointments as $appointment) {
                $this->timeIntervals[] = [
                    'title' => $appointment->interval->title,
                    'value' => $appointment->time_interval_id,
                ];
            }

            if(count($this->timeIntervals)) {
                $this->time_interval_id = $this->timeIntervals[0]['value'];
            }
        }
    }

    public function takeConsultants()
    {
        $this->consultant_id = null;
        $this->appointment_id = null;

        $consultantIds = ConsultantAppointmentInterval::query()
            ->doesntHave('consultation')
            ->where('date_at', $this->date_at)
            ->where('time_interval_id', $this->time_interval_id)
            ->select('consultant_id')
            ->distinct()
            ->get()
            ->toArray();

        $this->consultants = User::whereIn('id', $consultantIds)->get() ?? [];

        if(count($this->consultants)) {
            foreach ($this->consultants as $consultant) {
                if($consultant->id == $this->consultant_id) return;
            }

            $this->setConsultant($this->consultants[0]->id);
        }
    }

    public function setDate($date)
    {
        $this->date_at = $date;
        $this->takeTimeIntervals();
    }

    public function setConsultant($consultantId)
    {
        $this->consultant_id = $consultantId;
        $this->appointment_id = ConsultantAppointmentInterval::query()
            ->where('date_at', $this->date_at)
            ->where('time_interval_id', $this->time_interval_id)
            ->where('consultant_id', $this->consultant_id)
            ->first()->id ?? null;
    }

    public function changeStep(bool $next = true)
    {
        switch ($this->step) {
            case 'first':
                $newStep = $next ? "second" : 'first';
                break;
            case 'second':
                $newStep = $next ? "last" : "first";
                break;
            case 'last':
                $newStep = $next ? 'last' : 'second';
                break;
            default:
                $newStep = $next ? 'last' : 'first';
        }

        if($next && $this->canGoNextStep()) {
            if($newStep == "second") {
                $this->takeConsultants();
            }

            $this->step = $newStep;
        }

        if(!$next) {
            $this->step = $newStep;
        }
    }

    public function canGoNextStep(): bool
    {
        switch ($this->step) {
            case 'first':
                if(Auth::user()->hasRole('student')) {
                    if(!Auth::user()->finishedDepthTests) return false;
                }

                return $this->date_at && $this->time_interval_id && $this->child_id;
            default:
                return true;
        }
    }

    protected function validateAll() {
        $rules = $this->rules;
        if(!Auth::user()->hasRole('student')) {
            $rules = array_merge($rules, ['parent_id' => ['required', 'exists:users,id']]);
        }

        return $this->validate($rules, $this->messages, $this->attributes);
    }
}
