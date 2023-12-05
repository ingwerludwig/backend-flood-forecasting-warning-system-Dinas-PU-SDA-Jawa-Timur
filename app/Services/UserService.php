<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;

interface UserService
{
    public function createUser(RegisterRequest $request);
}

