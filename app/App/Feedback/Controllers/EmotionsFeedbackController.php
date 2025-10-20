<?php

namespace App\Feedback\Controllers;

use App\Feedback\Requests\StoreEmotionFeedbackRequest;
use Domain\Feedback\Actions\CreateEmotionsFeedback;
use Domain\Feedback\Models\EmotionsFeedback;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\States\Quiz\FinishedConsultationState;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class EmotionsFeedbackController extends Controller
{
    public function quizForm(AvailableQuiz $availableQuiz)
    {

        if($availableQuiz->user_id != Auth::id() || $availableQuiz->state != FinishedConsultationState::class) {
            abort(404);
        }

        return view('feedback.form_quiz_emotions')
            ->withAvailableQuiz($availableQuiz);
    }

    public function quizStore(StoreEmotionFeedbackRequest $request, AvailableQuiz $availableQuiz, CreateEmotionsFeedback $action)
    {

        if($availableQuiz->user_id != Auth::id() || $availableQuiz->state != FinishedConsultationState::class) {
            abort(404);
        }

        $user = $request->user();

        EmotionsFeedback::where('user_id', $user->id)
            ->where("feedbackable_id", $availableQuiz->quiz->id)
            ->where("feedbackable_type", Quiz::class)
            ->delete();

        $action->run($user, $request->all(), $availableQuiz->quiz->id, Quiz::class);

        return redirect()->to(route('quiz.result', $availableQuiz->id));
    }
}
