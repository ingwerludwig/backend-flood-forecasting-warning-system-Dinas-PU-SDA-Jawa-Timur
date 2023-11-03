<?php

namespace App\Repository;

use App\Http\Requests\InsertRoleRequest;
use App\Models\UsersRole;
class UsersRoleRepository
{
    public function insertRole($request){
        $data = UsersRole::addAdditionalData($request);
        $result = UsersRole::create($data);
        return $result;
    }
}
