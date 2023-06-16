<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class LoginRequestDto extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'user_name.required' => 'User name is required',
            'password.required' => 'Password is required',
        ];
    }
}
