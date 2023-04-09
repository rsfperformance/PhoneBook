<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $loginService;
    public function __construct(LoginService $loginService, RegisterService $registerService)
    {
        $this->loginService = $loginService;
        $this->registerService = $registerService;
    }

    public function login(Request $request)
    {
        return $this->loginService->login($request);
    }

    public function logout()
    {
        return $this->loginService->logout();
    }

    public function register(RegisterRequest $request)
    {
        return $this->registerService->register($request);
    }
}
