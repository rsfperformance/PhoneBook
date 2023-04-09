<?php

namespace App\Repositories;

use App\Http\Resources\ContactResource;
use App\Models\Contact;

class SearchRepository extends BaseRepository
{
    public function search($request)
    {
        $s = $request->get('search');
        $results = Contact::with(['phones', 'emails'])
            ->when(!is_null($s), function ($q) use ($s){
                $q->whereOr('full_name', 'LIKE', "%{$s}%")
                    ->whereHas('phones', function ($w) use ($s){
                        $w->whereOr('phone', $s);
                    })
                    ->whereHas('emails', function ($e) use ($s){
                        $e->whereOr('email', $s);
                    });
            })
            ->orderBy('created_at', 'desc')->get();
        return $this->successResponse('Success', ContactResource::collection($results));
    }
}
