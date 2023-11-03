<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertRoleRequest;
use App\Services\UsersRoleService;
use App\Http\Response\Response;

class UsersRoleController extends Controller
{
    protected $usersRoleService;

    public function __construct(UsersRoleService $usersRoleService)
    {
        $this->usersRoleService = $usersRoleService;
    }
    public function createUsersRole(InsertRoleRequest $request){
        try {
            $result = $this->usersRoleService->createRole($request);
            return response()->json(Response::success($result, 'Role created successfully', 200));
        } catch (\Exception $e) {
            return response()->json(Response::error('Role creation failed', 500, $e->getMessage()));
        }
    }
}
