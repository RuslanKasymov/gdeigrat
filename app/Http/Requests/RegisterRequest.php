<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric', 'min:10', 'max:12'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'city' => ['string', 'max:15'],
            'date_of_birth' => ['date_format'],
            'avatar' => ['image'],
        ];
    }
}
