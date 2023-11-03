<?php

namespace App\Services;

use App\Http\Requests\InsertRoleRequest;

interface UsersRoleService
{
    public function getAllRoles();
    public function createRole(InsertRoleRequest $request);
    public function changeRole($id,array $data);
}
