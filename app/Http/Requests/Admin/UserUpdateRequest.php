<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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

            ],
            'mobile' => [
                'required',
                'string',
                'ir_mobile:zero',
                'unique:users,mobile,' . $this->route('user')->id ],

            'password' => [
                'nullable',
                'string',
                'min:6',
                'max:255',

            ],
            'email' => [
                'required',
                'max:150',
                'email',
                'unique:users,mobile,' .$this->route('user')->id
            ]
        ];
    }
}
