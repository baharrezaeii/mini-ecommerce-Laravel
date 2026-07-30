<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => [
                'required',
                'persian_alpha_num',
                'max:255',
            ],

            'en_name' => [
                'required',
                'alpha_dash',
                'max:255',
            ],

            'product_category_id' => [
                'required',
                'exists:product_categories,id',
            ],

            'price' => [
                'required',
                'integer',
                'min:0',
            ],

            'discount' => [
                'nullable',
                'integer',
                'min:0',
                'lte:price',
            ],

            'qty' => [
                'required',
                'integer',
                'min:0',
            ],



            'description' => [
                'nullable',
                'max:1000',
            ],

            'images' => [
                'required',
                'array',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:3096',
            ],
        ];
    }
}
