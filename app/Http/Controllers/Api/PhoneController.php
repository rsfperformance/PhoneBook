<?php

namespace App\Http\Controllers\Api;

use App\Services\PhoneService;
use Illuminate\Http\Request;

class PhoneController extends BaseController
{
    public $phoneService;

    public function __construct(PhoneService $phoneService)
    {
        parent::__construct();
        $this->phoneService = $phoneService;
    }

    public function store(Request $request)
    {
        return $this->phoneService->store($request);
    }

    public function update(Request $request)
    {
        return $this->phoneService->update($request);
    }

    public function destroy($id)
    {
        return $this->phoneService->destroy($id);
    }
}
