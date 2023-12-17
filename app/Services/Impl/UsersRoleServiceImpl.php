<?php

namespace App\Services\Impl;

use App\Http\Requests\InsertRoleRequest;
use App\Repository\UsersRoleRepository;
use App\Services\UsersRoleService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class UsersRoleServiceImpl implements UsersRoleService
{
    protected UsersRoleRepository $usersRoleRepository;

    public function __construct(UsersRoleRepository $usersRoleRepository)
    {
        $this->usersRoleRepository = $usersRoleRepository;
    }

    public function getAllRoles(): Collection
    {
        try
        {
            return $this->usersRoleRepository->getAllRoles();
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function createRole(InsertRoleRequest $request)
    {
        try
        {
            $req = $request->validated();
            return $this->usersRoleRepository->insertRole($req);
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function changeRole($id, array $data)
    {
        // TODO: Implement changeRole() method.
    }
}
