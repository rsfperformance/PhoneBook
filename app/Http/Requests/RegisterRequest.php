<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    use ApiResponse;
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string'],
            'email' => ['required', 'unique:users'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required', [], 'en'),
            'unique' => trans('validation.unique', [], 'en'),
            'same' => trans('validation.same', [], 'en')
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $response = $this->errorResponse($validator->errors());
        throw new HttpResponseException($response);
    }
}
