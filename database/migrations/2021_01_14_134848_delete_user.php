<?php

use Domain\Consultant\Models\ConsultantAppointmentInterval;
use Domain\Consultation\Models\Consultation;
use Domain\Consultation\Models\ConsultationResult;
use Domain\Consultation\Models\ConsultationReview;
use Domain\Event\Models\EventInvite;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\Admin;
use Domain\User\Models\StageTestsAndConsultations;
use Domain\User\Models\User;
use Domain\User\Models\UserSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DeleteUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = User::whereIn('phone', ['+79126170072'])->get();

        /** @var User $user */
        foreach ($users as $user) {
            $user->studentQuestionnaireResult()->delete();
            $user->parentQuestionnaireResult()->delete();
            $user->factorMotiveOfChoiceResult()->delete();
            $user->characterTraitResult()->delete();
            $user->professionalTypeResult()->delete();
            $user->suitableProfessions()->delete();
            $user->inclinationResult()->delete();
            $user->intelligenceLevelResult()->delete();
            $user->typeOfThinkingResult()->delete();
            $user->solutionOfCasesResult()->delete();
            $user->observers()->delete();
            $user->observedUsers()->delete();
            $user->availableQuizzes()->delete();
            $user->student()->delete();
            $user->employee()->delete();
            $user->consultant()->delete();
            $user->events()->delete();
            $user->feedback()->delete();
            $user->emotionsFeedback()->delete();
            EventInvite::where('user_id', $user->id)->withTrashed()->forceDelete();
            UserAnswer::where('user_id', $user->id)->withTrashed()->forceDelete();
            Consultation::where('child_id', $user->id)->delete();
            Consultation::where('parent_id', $user->id)->delete();
            Consultation::where('consultant_id', $user->id)->delete();
            ConsultationReview::where('user_id', $user->id)->delete();
            ConsultantAppointmentInterval::where('consultant_id', $user->id)->delete();
            Admin::where('id', $user->id)->delete();
            StageTestsAndConsultations::where('user_id', $user->id)->withTrashed()->forceDelete();
            UserSetting::where('user_id', $user->id)->delete();
            DB::table('school_class_curators')->where('curator_id', $user->id)->delete();
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
