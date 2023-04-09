<?php

namespace App\Services;

use App\Http\Controllers\Api\BaseController;
use App\Models\Phone;

class PhoneService extends BaseController
{
    public function store($request)
    {
        foreach ($request->phone_numbers as $phone_number){
            Phone::create([
                'contact_id' => $request->contact_id,
                'phone' => $phone_number
            ]);
        }
        return $this->successResponse('Created Successful');
    }

    public function update($request)
    {
        foreach ($request->phone_numbers as $phone_number){
            $phone = Phone::find($phone_number['id']);
                if ($phone){
                    $phone->update([
                        'phone' => $phone_number['phone']
                    ]);
                }
        }
        return $this->successResponse('Updated Successful');
    }

    public function destroy($id)
    {
        $phone = Phone::find($id);
        if ($phone){
            $phone->delete();
            return $this->successResponse('Deleted Successful');
        }else{
            return $this->errorResponse('No number with this id');
        }
    }
}
