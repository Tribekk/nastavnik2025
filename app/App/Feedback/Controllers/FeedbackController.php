<?php

namespace App\Feedback\Controllers;

use App\Feedback\Requests\StoreFeedbackRequest;
use Domain\Feedback\Actions\CreateFeedback;
use Support\Controller;

class FeedbackController extends Controller
{
    public function form()
    {

        return view('feedback.form');
    }

    public function store(StoreFeedbackRequest $request, CreateFeedback $createAction)
    {
        $user = $request->user();
        $user->feedback()->delete();
        $createAction->run($user, $request->all());

        return redirect()->route('dashboard');
    }
}
