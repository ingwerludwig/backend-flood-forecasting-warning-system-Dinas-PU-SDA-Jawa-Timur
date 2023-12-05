<?php

namespace App\Repository;

use App\Models\UsersRole;
use Illuminate\Database\Eloquent\Collection;

class UsersRoleRepository
{
    public function insertRole($request)
    {
        $data = UsersRole::addAdditionalData($request);
        return UsersRole::create($data);
    }

    public function getAllRoles(): Collection
    {
        return UsersRole::all();
    }
}
