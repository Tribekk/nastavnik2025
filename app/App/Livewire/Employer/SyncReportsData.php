<?php

namespace App\Livewire\Employer;

use App\Jobs\SyncStagesTestsAndConsultationsJob;
use Domain\User\Actions\SyncStageTestsAndConsultationsAction;
use Livewire\Component;

class SyncReportsData extends Component
{
    public string $label;

    public function render()
    {
        return view('livewire.employer.sync-reports-data');
    }

    public function mount(string $label)
    {
        $this->label = $label;
    }

    public function syncData()
    {
        try {
            $action = new SyncStageTestsAndConsultationsAction();
            $action->run();

            $this->dispatchBrowserEvent('show-message', [
                'title' => __('Обновление данных'),
                'text' => __('Данные были успешно синхронизированы.'),
                'icon' => 'success',
                'redirect' => route('dashboard'),
            ]);
        } catch (\Exception $exception) {
            $this->dispatchBrowserEvent('show-message', [
                'title' => __('Обновление данных'),
                'text' => __('Произошла ошибка и мы не смогли обновить данные! Попробуйте позже.'),
                'icon' => 'error'
            ]);
        }
    }
}
