<?php

namespace App\Jobs;

use Domain\User\Actions\SyncStageTestsAndConsultationsAction;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncStagesTestsAndConsultationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 0;

    protected SyncStageTestsAndConsultationsAction $action;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->action = new SyncStageTestsAndConsultationsAction();
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle()
    {
        $this->action->run();
    }
}
