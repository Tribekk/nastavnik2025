<?php

namespace App\Console\Commands;

use Domain\User\Actions\SyncStageTestsAndConsultationsAction;
use Exception;
use Illuminate\Console\Command;

class UpdateStageTestsAndConsultations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:stage_tests_and_consultations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command update data from stages_tests_and_consultations table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws Exception
     */
    public function handle()
    {
        try {
            $action = new SyncStageTestsAndConsultationsAction();
            $action->run();
        } catch (Exception $exception) {
            $this->error($exception->getMessage());
        }

        return 0;
    }
}
