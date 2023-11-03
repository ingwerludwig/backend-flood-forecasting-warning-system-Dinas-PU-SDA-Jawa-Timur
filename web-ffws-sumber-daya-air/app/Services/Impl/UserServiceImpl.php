<?php

namespace App\Services\Impl;

use App\Http\Requests\RegisterRequest;
use App\Repository\UserRepository;
use App\Services\UserService;

class UserServiceImpl implements UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function createUser(RegisterRequest $request)
    {
        try {
            $req = $request->validated();
            $result = $this->userRepository->insertUser($req);
            return $result;
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new \RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

}
