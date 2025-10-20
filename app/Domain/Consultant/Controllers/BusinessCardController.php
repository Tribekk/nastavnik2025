<?php

namespace Domain\Consultant\Controllers;

use Domain\Consultant\Actions\UpdateConsultantAction;
use Domain\Consultant\Requests\UpdateBusinessCardRequest;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class BusinessCardController extends Controller
{
    public function card()
    {
        return view('consultant.business-card.business-card')
            ->withUser(Auth::user());
    }

    public function edit()
    {
        return view('consultant.business-card.edit-business-card')
            ->withUser(Auth::user());
    }

    public function update(UpdateBusinessCardRequest $request, UpdateConsultantAction $action)
    {
        $action->run($request->user(), $request->validated());
        return redirect()->to(route('consultant.business_card'));
    }
}
