<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'image' => ['required', 'image', 'max:3000'],
            'offer' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:255'],
            'button_link' => ['nullable', 'string', 'max:255'],
            'status' => ['boolean'],
        ];
    }
}
