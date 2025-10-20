<?php


namespace App\Admin\Actions;


use Domain\User\Models\User;

class GetUsersAction
{
    public function run(array $filters = [])
    {
        $query = User::query();

        if (!empty($filters['last_name'])) {
            $query->where('last_name', 'like', '%' . $filters['last_name'] . '%');
        }

        if (!empty($filters['first_name'])) {
            $query->where('first_name', 'like', '%' . $filters['first_name'] . '%');
        }

        if (!empty($filters['middle_name'])) {
            $query->where('middle_name', 'like', '%' . $filters['middle_name'] . '%');
        }

        if (!empty($filters['type_id'])) {
            $query->where('type_id', $filters['type_id']);
        }

        if (!empty($filters['created_at_start'])) {
            $query->whereDate('created_at', '>=', $filters['created_at_start']);
        }

        if (!empty($filters['created_at_end'])) {
            $query->whereDate('created_at', '<=', $filters['created_at_end']);
        }

        if (!empty($filters['role_id'])) {
            $role_id = $filters['role_id'];
            $query->join('model_has_roles', function ($join) use ($role_id) {
                $join->on('users.id', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.role_id', $role_id);
            });
        }

        if (!empty($filters['school_id'])) {
            $query->where('school_id', $filters['school_id']);
        }

        if (!empty($filters['class_id'])) {
            $query->where('class_id', $filters['class_id']);
        }

        if (!empty($filters['is_admin']) && $filters['is_admin'] == 'on') {
            $query->has('admin');
        }

        return $query->paginate();
    }
}
