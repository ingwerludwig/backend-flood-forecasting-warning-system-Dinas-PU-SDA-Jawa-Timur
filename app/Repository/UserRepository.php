<?php

namespace App\Repository;

use App\Models\Users;

class UserRepository
{
    public function insertUser($request)
    {
        $data = Users::addAdditionalData($request);
        return Users::create($data);
    }
}
