<?php

namespace App\Livewire\Event;

use Domain\Event\Actions\DeleteAttachedFileAction;
use Domain\Event\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AttachedFiles extends Component
{
    public Event $event;
    public Collection $files;

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->files = $event->attachedFiles;
    }

    public function render()
    {
        return view('livewire.event.attached-files');
    }

    public function deleteFile(int $id)
    {
        $action = new DeleteAttachedFileAction();
        $action->run($id);
        $this->files = $this->event->attachedFiles()->get();
    }
}
