<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConfirmInfosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hotelName' => 'required',
            'hotelDesc' => 'required',
            'hotelStars' => 'required|integer|gt:2',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ]));

    }

    public function messages()
    {

        return [
            'hotelName.required' => 'Hotel Name is required',
            'hotelDesc.required' => 'Hotel Decription is required',
            'hotelStars.required' => 'Hotel Stars is required'
        ];

    }
}