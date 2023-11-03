<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Response\Response;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $usersService;

    public function __construct(UserService $userService)
    {
        $this->usersService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $result = $this->usersService->createUser($request);
            $user_data = $this->returnUserData($result);
            JWTAuth::fromUser($result);
            return response()->json(Response::success($user_data, 'User created successfully', 200));
        }
        catch (\Exception $e) {
            return response()->json(Response::error('User Registration failed', 500, $e->getMessage()));
        }
    }

    public function returnUserData($request){
        return [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'role' => $request->role,
        ];
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials))
        {
            return response()->json(Response::unauthorizedLoginResponse());
        }

        $user = $this->returnUserData(auth()->user());
        return response()->json(Response::validLoginResponse($user, $token, 'User login successfully'),200);
    }

    public function logout()
    {
        try {
            auth()->logout();
            return response()->successLogoutResponse();

        } catch (TokenInvalidException) {
            return response()->json(Response::unauthorizedLoginResponse());

        } catch (JWTException) {
            return response()->json(Response::invalidTokenResponse());
        }
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 //mention the guard name inside the auth fn
        ]);
    }
}
