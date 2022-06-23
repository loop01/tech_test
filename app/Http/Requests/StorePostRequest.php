<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20',
            'lastname' => 'required|max:25',
            'email' => 'required|email:rfc,dns'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Inserisci il nome',
            'name.max' => 'Il campo nome deve contenere max 20 caratteri',
            'lastname.required' => 'Inserisci il cognome',
            'lastname.max' => 'Il campo cognome deve contenere max 25 caratteri',
            'email.required' => 'Inserisci la tua mail',
            'email.email' => 'Inserisci una mail valida'
        ];
    }

    protected function failedValidation(Validator $validator) {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json($errors));
    }
}
