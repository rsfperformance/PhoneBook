<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Services\BaseService;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends BaseController
{
    public $contactService;

    public function __construct(ContactService $contactService)
    {
        parent::__construct();
        $this->contactService = $contactService;
    }

    public function index()
    {
        return $this->successResponse('Success', ContactResource::collection(Contact::where('user_id', \auth('sanctum')->user()->id)->get()));
    }

    public function store(Request $request)
    {
        return $this->contactService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->contactService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->contactService->destroy($id);
    }
}
