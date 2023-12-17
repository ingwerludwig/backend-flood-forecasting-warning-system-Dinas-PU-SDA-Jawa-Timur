<?php

namespace App\Services\Impl;

use App\Http\Requests\RegisterRequest;
use App\Repository\UserRepository;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class UserServiceImpl implements UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function createUser(RegisterRequest $request)
    {
        try
        {
            $req = $request->validated();
            return $this->userRepository->insertUser($req);
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

}
