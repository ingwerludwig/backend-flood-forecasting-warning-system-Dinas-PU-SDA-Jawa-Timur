<?php

namespace App\Services\Impl;

use App\Http\Requests\InsertRoleRequest;
use App\Services\UsersRoleService;
use Illuminate\Support\Facades\Log;
use App\Repository\UsersRoleRepository;

class UsersRoleServiceImpl implements UsersRoleService
{
    protected UsersRoleRepository $usersRoleRepository;

    public function __construct(UsersRoleRepository $usersRoleRepository)
    {
        $this->usersRoleRepository = $usersRoleRepository;
    }

    public function getAllRoles()
    {
        try {
            $result = $this->usersRoleRepository->getAllRoles();
            return $result;
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new \RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function createRole(InsertRoleRequest $request)
    {
        try {
            $req = $request->validated();
            $result = $this->usersRoleRepository->insertRole($req);
            return $result;
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new \RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function changeRole($id, array $data)
    {
        // TODO: Implement changeRole() method.
    }
}
