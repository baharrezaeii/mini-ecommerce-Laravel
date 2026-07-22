<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutPostRequest extends FormRequest
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
            'user_province' => ['required', 'persian_alpha', 'max:30'],
            'user_city' => ['required', 'persian_alpha', 'max:30'],
            'user_address' => ['required', 'persian_alpha'],
            'user_postal_code' => ['required', 'digits:10','ir_postal_code'],
            'user_mobile' => ['required', 'digits:11','ir_mobile:zero'],
            'description' => ['nullable', 'persian_alpha'],
        ];
    }
}
