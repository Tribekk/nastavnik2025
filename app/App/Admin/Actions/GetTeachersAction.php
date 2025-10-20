<?php


namespace App\Admin\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

class GetTeachersAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = User::query()->with('school');

        if ($transform) {
            $query->select(['id', 'first_name as text']);

            if($q) {
                $query
                    ->where('first_name', 'like', '%' . $q . '%');
            }
        }

        if ($q && !$transform) {
            $query
                ->where('first_name', 'like', '%' . $q . '%')
                ->orWhere('last_name', 'like', '%' . $q . '%')
                ->orWhere('middle_name', 'like', '%' . $q . '%')
                ->orWhereHas('school', function ($query1) use ($q) {
                    $query1->where('title', 'like', '%' . $q . '%');
            });
        }

        $query->whereHas('roles', function ($query) {
            $query->whereIn('name', ['teacher', 'curator']);
        });

        if(!Auth::user()->isAdmin) {
            $query->where('school_id', Auth::user()->school_id);
        }

        return $query->paginate();
    }
}
