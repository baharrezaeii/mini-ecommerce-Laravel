<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EditProfilePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'persian_alpha',
                'min:2',
                'max:100',
            ],
            'last_name' => [
                'required',
                'persian_alpha',
                'min:3',
                'max:100',
                'unique:App\Models\User'
            ],
            'mobile' => [
                'required',
                'string',
                'ir_mobile:zero',
                'unique:App\Models\User,mobile,' . auth()->id()
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:255',
                'confirmed'
            ],
            'email' => [
                'required',
                'max:150',
                'email',
                'unique:App\Models\User'
            ]
        ];
    }
}
