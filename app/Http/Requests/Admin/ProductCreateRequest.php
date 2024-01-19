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

            'image' => [$this->isPostRequest(), 'max:3000', 'image'],
            'name' => ['required',  'max:255'],
            'category_id' => ['required', 'integer'],
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

    private function isPostRequest() : string
    {
        return request()->isMethod('post') ? 'required' : 'sometimes';
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Select a category',
            'category_id.integer' => 'Select a category',
        ];
    }
        
}
