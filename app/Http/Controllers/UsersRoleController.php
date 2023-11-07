<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertRoleRequest;
use App\Services\UsersRoleService;
use App\Http\Response\Response;
use Illuminate\Http\JsonResponse;

class UsersRoleController extends Controller
{
    protected UsersRoleService $usersRoleService;

    public function __construct(UsersRoleService $usersRoleService)
    {
        $this->usersRoleService = $usersRoleService;
    }

    public function createUsersRole(InsertRoleRequest $request): JsonResponse
    {
        $result = $this->usersRoleService->createRole($request);
        return response()->json(Response::success($result, 'Role created successfully', 200));
    }

    public function getAllUsersRole(): JsonResponse
    {
        $result = $this->usersRoleService->getAllRoles();
        return response()->json(Response::success($result, 'Role collected successfully', 200));
    }
}
