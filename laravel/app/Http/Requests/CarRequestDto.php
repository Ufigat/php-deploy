<?php

namespace App\Http\Requests;

use \Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CarRequestDto extends FormRequest
{
    public function rules()
    {
        return [
            'brand' => 'required|string',
            'color' => 'required|string',
            'number' => 'required|string',
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
            'brand.required' => 'Brand is required',
            'color.required' => 'Color is required',
            'number.required' => 'Number is required',
        ];
    }
}
