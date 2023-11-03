<?php

namespace App\Repository;
use App\Models\Users;

class UserRepository
{
    public function insertUser($request)
    {
        $data = Users::addAdditionalData($request);
        $user = Users::create($data);
        return $user;
    }
}
