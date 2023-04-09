<?php

namespace App\Services\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class RegisterService extends BaseService
{
    public function register($request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        Auth::login($user);
        $token = $user->createToken('myapptoken')->plainTextToken;
        return $this->successResponse('Success', [
            'token' => $token,
            'user' => UserResource::make($user)
        ]);
    }
}
