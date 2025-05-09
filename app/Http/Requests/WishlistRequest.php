<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WishlistRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => [
                'required',
                'integer',
                'exists:products,id' // Ensure the product ID exists in the products table, might need to take out for security reasons
            ],
            'quantity' => [
                'integer',
                'min:1'
            ],
        ];
    }

    public function messages(): array
    {
        return
            [
                'product_id.exists' => 'Product ID does not exist in the database.',
            ];
    }
}
