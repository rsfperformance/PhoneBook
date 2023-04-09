<?php

namespace App\Http\Controllers\Api;

use App\Services\EmailService;
use App\Services\PhoneService;
use Illuminate\Http\Request;

class EmailController extends BaseController
{
    public $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function store(Request $request)
    {
        return $this->emailService->store($request);
    }

    public function update(Request $request)
    {
        return $this->emailService->update($request);
    }

    public function destroy($id)
    {
        return $this->emailService->destroy($id);
    }
}
