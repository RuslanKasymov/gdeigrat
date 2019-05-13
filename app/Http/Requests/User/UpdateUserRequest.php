<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['string', 'nullable', 'max:255'],
            'email' => ['string', 'nullable', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id),],
            'phone' => ['required', 'numeric'],
            'city' => ['string', 'nullable', 'max:255'],
        ];
    }
}
