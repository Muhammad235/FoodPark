<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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

            'image' => ['required', 'max:3000'],
            'name' => ['required',  'max:255'],
            'category_id' => ['required', 'numeric'],
            'short_description' => ['required', 'max:500'],
            'long_description' => ['required'],
            'price' => ['required', 'numeric'],
            'offer_price' => ['nullable', 'numeric'],
            'sku' => ['required', 'max:255'],
            'show_at_home' => ['required', 'boolean'],
            'seo_title' => ['required', 'max:255'],
            'seo_description' => ['required', 'max:255'],
            'status' => ['required', 'boolean'],
        ];
    }
}
