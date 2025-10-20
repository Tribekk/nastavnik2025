<?php

namespace App\Admin\Actions;

use Domain\Admin\Models\School;
use Str;

class CreateSchoolAction
{
    public function run(array $data = []): ?School
    {
        return School::create([
            'uuid' => $data['uuid'] ?? Str::uuid(),
            'title' => $data['title'],
            'short_title' => $data['short_title'],
            'address' => $data['address'],
            'local' => $data['local'],
            'number' => $data['number'],
            'director' => $data['director'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'type_of_educational_organization_id' => $data['type_of_educational_organization_id'],
            'loyalty_level_id' => $data['loyalty_level_id'] ?? null,
            'token' => $data['token'] ?? School::generateToken(),
        ]);
    }
}
