<?php

namespace App\Services\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginService extends BaseService
{
    public function login($request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('myapptoken')->plainTextToken;

            return $this->successResponse('Login success', [
                'token' => $token,
                'user' => UserResource::make($user),
            ]);
        } else {
            return $this->errorResponse('Invalid login credentials', Response::HTTP_UNAUTHORIZED);
        }
    }

    public function logout()
    {
        \auth('sanctum')->user()->currentAccessToken()->delete();
        return $this->successResponse('User successfully logout');
    }
}
