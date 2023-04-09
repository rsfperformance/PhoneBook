<?php

namespace App\Services;

use App\Http\Controllers\Api\BaseController;
use App\Models\Email;
use App\Models\Phone;

class EmailService extends BaseController
{
    public function store($request)
    {
        foreach ($request->emails as $email){
            Email::create([
                'contact_id' => $request->contact_id,
                'email' => $email
            ]);
        }
        return $this->successResponse('Created Successful');
    }

    public function update($request)
    {
        foreach ($request->emails as $email){
            $emailModel = Email::find($email['id']);
                if ($emailModel){
                    $emailModel->update([
                        'email' => $email['email']
                    ]);
                }
        }
        return $this->successResponse('Updated Successful');
    }

    public function destroy($id)
    {
        $email = Email::find($id);
        if ($email){
            $email->delete();
        }else{
            return $this->errorResponse('No email with this id');
        }
        return $this->successResponse('Deleted Successful');
    }
}
