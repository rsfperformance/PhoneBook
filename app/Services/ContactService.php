<?php

namespace App\Services;

use App\Models\Contact;
use Symfony\Component\HttpFoundation\Response;

class ContactService extends BaseService
{
    public function store($request)
    {
        $user_id = auth('sanctum')->user()->id;

        $existingContact = Contact::where('user_id', $user_id)->where('full_name', $request->get('full_name'))->first();

        if ($existingContact){
            return $this->errorResponse('Contact already exists', Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            Contact::create([
                'user_id' => $user_id,
                'full_name' => $request->get('full_name'),
                'date_of_birth' => $request->get('date_of_birth')
            ]);
            return $this->successResponse('success');
        }
    }

    public function update($request, $id)
    {
        $user_id = auth('sanctum')->user()->id;
        $existingContact = Contact::where('user_id', $user_id)->where('full_name', $request->get('full_name'))->first();

        if ($existingContact){
            return $this->errorResponse('Contact already exists', Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            Contact::find($id)->update([
                'full_name' => $request->get('full_name'),
                'date_of_birth' => $request->get('date_of_birth')
            ]);
            return $this->successResponse('success');
        }
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return $this->successResponse('Deleted successful');
        }else{
            return $this->errorResponse('No contact with this id');
        }
    }
}
