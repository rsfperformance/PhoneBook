<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

abstract class BaseController extends Controller
{
    use ApiResponse;
    public function __construct()
    {
        $this->middleware(['api.auth']);
//        'auth:sanctum',
    }
}
