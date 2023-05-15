<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConfirmPhotosRequest extends FormRequest
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
            // 'hotelPhotos' => 'required|array|min:3',
            'hotelPhotos' => 'required|array|min:3',
            'hotelPhotos.*' => 'required|image',
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
            'hotelPhotos.required' => 'Hotel photos is required',
            'hotelPhotos.array' => 'Hotel array is required',
            'hotelPhotos.min' => 'Hotel array must 3 above',
        ];

    }
}