<?php
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Quiz\Controllers;

use App\Quiz\Wrappers\QuestionnaireResultWrapper;
use Domain\Quiz\Models\ParentQuestionnaireResult;
use Domain\Quiz\Models\StudentQuestionnaireResult;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class QuestionnaireController extends Controller
{
    public function student($user = null)
    {
        $user = $user ? User::findOrFail($user) : Auth::user();
        $data = $this->takeStudentData($user);

        return view('quiz.questionnaire._student-questionnaire')
            ->with($data);
    }

    public function parent($user = null)
    {
        $user = $user ? User::findOrFail($user) : Auth::user();
        $data = $this->takeParentData($user);

        return view('quiz.questionnaire._parent-questionnaire')
            ->with($data);
    }

    protected function takeStudentData(User $user)
    {
        $result = StudentQuestionnaireResult::where('user_id', $user->id)->firstOrFail();
        if(empty($result)) abort(404);

        $values = $result->values()
            ->with('question')
            ->select('question_id')
            ->distinct()
            ->orderBy('question_id', 'asc')->get();

        $wrapper = new QuestionnaireResultWrapper($result);

        return [
            'user' => $user,
            'result' => $result,
            'values' => $values,
            'wrapper' => $wrapper,
        ];
    }

    protected function takeParentData(User $user)
    {
        $result = ParentQuestionnaireResult::where('user_id', $user->id)->firstOrFail();
        if(empty($result)) abort(404);

        $values = $result->values()
            ->with('question')
            ->select('question_id')
            ->distinct()
            ->orderBy('question_id', 'asc')->get();

        $wrapper = new QuestionnaireResultWrapper($result);

        return [
            'user' => $user,
            'result' => $result,
            'values' => $values,
            'wrapper' => $wrapper,
        ];
    }
}
