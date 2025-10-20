<?php

use Domain\Consultation\Models\Consultation;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Database\Migrations\Migration;

class DeleteUsersFormUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up()
    {
        $users = User::whereIn('phone',
            ['+79028774401', '+79505631460', '+79046523694', '+79459527524', '+79090789579', '+79122054553'])
            ->get();

        /** @var User $user */
        foreach ($users as $user) {
            $user->studentQuestionnaireResult()->delete();
            $user->factorMotiveOfChoiceResult()->delete();
            $user->characterTraitResult()->delete();
            $user->professionalTypeResult()->delete();
            $user->suitableProfessions()->delete();
            $user->inclinationResult()->delete();
            $user->intelligenceLevelResult()->delete();
            $user->typeOfThinkingResult()->delete();
            $user->solutionOfCasesResult()->delete();
            UserAnswer::where('user_id', $user->id)->delete();
            Consultation::where('child_id', $user->id)->delete();
            Consultation::where('parent_id', $user->id)->delete();
            $user->observers()->delete();
            $user->observedUsers()->delete();
            $user->availableQuizzes()->delete();
            $user->delete();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
