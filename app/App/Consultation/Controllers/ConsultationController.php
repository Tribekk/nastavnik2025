<?php

namespace App\Consultation\Controllers;

use Domain\Consultation\Actions\GetConsultationsAction;
use Domain\Consultation\Actions\UpdateConsultationAction;
use Domain\Consultation\Actions\UpdateOrCreateConsultationReviewAction;
use Domain\Consultation\Models\Consultation;
use Domain\Consultation\Notifications\ConsultationConfirmedNotification;
use Domain\Consultation\Notifications\ConsultationRejectedNotification;
use Domain\Consultation\Notifications\ConsultationLinkAppearedNotification;
use Domain\Consultation\Notifications\RemoveConsultationNotification;
use Domain\Consultation\Requests\StoreFeedbackConsultationRequest;
use Domain\Consultation\Requests\UpdateConsultationRequest;
use Domain\Consultation\States\CarriedOutConsultationState;
use Domain\Consultation\States\ConfirmedConsultationState;
use Domain\Consultation\States\ConsultationState;
use Domain\Consultation\States\NotCarriedOutConsultationState;
use Domain\Consultation\States\NotVerifiedConsultationState;
use Domain\Feedback\Actions\UpdateOrCreateEmotionsFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConsultationController
{
    public function recordForm()
    {
        if(!Auth::user()->hasAnyRole(['parent', 'student'])) abort(403);
        return view('consultations.record_form');
    }

    public function index(Request $request, GetConsultationsAction $action)
    {
        if(!Auth::user()->hasAnyRole(['parent', 'consultant', 'student'])) abort(403);
        $consultations = $action->run(Auth::user(), $request);

        return view('consultations.index')
            ->withConsultations($consultations);
    }

    public function destroy(Consultation $consultation)
    {
        if(!Auth::user()->hasAnyRole(['parent', 'consultant', 'student'])) abort(403);
        if(Auth::user()->hasRole('parent') && $consultation->parent_id != Auth::id()) abort(403);
        if(Auth::user()->hasRole('consultant') && $consultation->consultant_id != Auth::id()) abort(403);
        if(Auth::user()->hasRole('student') && $consultation->child_id != Auth::id()) abort(403);

        if(!Auth::user()->hasRole('consultant') && !($consultation->state->is(NotVerifiedConsultationState::class) ||
            $consultation->state->is(NotCarriedOutConsultationState::class))) {
            return back()->withErrors(['error' => 'Вы не можете удалить данную консультацию т.к. консультант перевел консультацию в рабочий статус.']);
        }

        try {
            $consultation->delete();

            if(Auth::user()->hasRole('parent')) {
                try {
                    $consultation->consultant->notify(new RemoveConsultationNotification($consultation));
                    $consultation->child->notify(new RemoveConsultationNotification($consultation));
                    $consultation->parent->notify(new RemoveConsultationNotification($consultation));
                } catch (\Exception $exception) {
                    Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
                }
            }
            else if(Auth::user()->hasRole('consultant')) {
                try {
                    $consultation->consultant->notify(new RemoveConsultationNotification($consultation));
                    $consultation->child->notify(new ConsultationRejectedNotification($consultation));
                    if($consultation->parent) {
                        $consultation->parent->notify(new ConsultationRejectedNotification($consultation));
                    }
                } catch (\Exception $exception) {
                    Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
                }
            }
            else {
                try {
                    $consultation->consultant->notify(new RemoveConsultationNotification($consultation));
                    $consultation->child->notify(new RemoveConsultationNotification($consultation));
                } catch (\Exception $exception) {
                    Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
                }
            }
        }
        catch (\Exception $exception) {
            if(!Auth::user()->hasRole('consultant')) {
                return back()->withErrors(['error' => 'Не удалось удалить консультацию т.к. консультант сформировал отчет.']);
            }

            $consultation->feedbacks()->delete();
            $consultation->review()->delete();
            $consultation->result()->delete();
            $consultation->delete();
        }

        return redirect()->to(route('consultations.list'));
    }

    public function show(Consultation $consultation)
    {
        if(Auth::user()->hasRole('parent') && $consultation->parent_id == Auth::id() ||
            Auth::user()->hasRole('student') && $consultation->child_id == Auth::id()) {

            if($consultation->state->is(CarriedOutConsultationState::class)) {
                return view('consultations.feedback')->withConsultation($consultation);
            }

            return !$consultation->state->is(NotVerifiedConsultationState::class) ?
                view('consultations.record_confirmed')
                    ->withConsultation($consultation) :
                view('consultations.recorded')
                    ->withConsultation($consultation);
        }


        return abort(403);
    }

    public function edit(Consultation $consultation)
    {
        if(!(Auth::user()->hasRole('consultant') && $consultation->consultant_id == Auth::id())) abort(403);

        $stateNames = $consultation->state->transitionableStates();
        $states = [];

        /** @var ConsultationState $stateNamespace */
        foreach ($stateNames as $stateName) {
            $stateClass = ConsultationState::resolveStateClass($stateName);
            $state = new $stateClass($consultation);
            $states[] = ['value' => $state->code(), 'title' => $state->title()];
        }


        return view('consultations.edit')
            ->withConsultation($consultation)
            ->withStates($states);

    }

    public function confirm(Consultation $consultation)
    {
        if(!(Auth::user()->hasRole('consultant') && $consultation->consultant_id == Auth::id())) abort(403);

        $consultation->state->transitionTo(ConfirmedConsultationState::class);

        try {
            $consultation->child->notify(new ConsultationConfirmedNotification($consultation));
            if($consultation->parent) {
                $consultation->parent->notify(new ConsultationConfirmedNotification($consultation));
            }
        } catch (\Exception $exception) {
            Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
        }

        return back();
    }

    public function update(UpdateConsultationRequest $request, Consultation $consultation, UpdateConsultationAction $action)
    {
        $upd = $action->run($consultation, $request->all());

        if($upd && $request->input('communication_type_value', false)) {
            try {
                $consultation->child->notify(new ConsultationLinkAppearedNotification($consultation));
                if($consultation->parent) {
                    $consultation->parent->notify(new ConsultationLinkAppearedNotification($consultation));
                }
            } catch (\Exception $exception) {
                Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
            }
        }

        return back();
    }

    public function storeFeedback(StoreFeedbackConsultationRequest $request, Consultation $consultation, UpdateOrCreateEmotionsFeedback $actionEmotionFeedback, UpdateOrCreateConsultationReviewAction  $actionReview)
    {
        DB::transaction(function () use ($request, $consultation, $actionEmotionFeedback, $actionReview){
            $actionEmotionFeedback->run(Auth::user(),
                $request->validated(),
                $consultation->id,
                Consultation::class);

            if($request->input('text', false)) {
                if(Auth::user()->hasRole('parent')) {
                    $actionReview->run(Auth::user(), $consultation, $request->validated());
                }

                if(Auth::user()->hasRole('student') && $consultation->child_id == Auth::id() && !$consultation->parent_id) {
                    $actionReview->run(Auth::user(), $consultation, $request->validated());
                }
            }
        });

        return redirect()->to(route('consultations.list'));
    }
}
