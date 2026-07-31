<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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

            'username' => [
                'required',
                'unique:admins,username,' . $this->route('admin')->id,
            ],

            'email' => [
                'required',
                'email',
                'unique:admins,email,' . $this->route('admin')->id,
            ],

            'password' => ['nullable', 'min:8'],

            'status' => ['required'],

            'image' => ['nullable', 'image'],
        ];
    }
}
