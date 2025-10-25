<?php

namespace App\Admin\Requests;

use Domain\User\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->route('user');

        if (!$user instanceof User) {
            return false;
        }

        return (bool) $user->getAttribute('can_be_deleted_by_admin');
    }

    public function rules(): array
    {
        return [];
    }
}
