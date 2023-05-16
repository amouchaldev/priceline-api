<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
        ];
    }

    public function messages() {
        return [
            'email.unique' => 'cet e-mail a déjà utilisé',
            'email.required' => 'Le champ email est obligatoire',
            'email.email' => 'Le champ email doit être une adresse email valide',
            'firstName.required' => 'Le champ prénom est obligatoire',
            'lastName' => 'Le champ nom est obligatoire',
            'password.required' => 'Le champ mot de passe est obligatoire',
            'password.min' => 'Le champ du mot de passe doit contenir au moins 8 caractères',
            'c_password.same' => 'Le champ mot de passe c doit correspondre au mot de passe',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
