<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriRequest extends FormRequest
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
             'name'=> 'required',
            'price'=> 'required',
            'image'=> 'required'
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'oi beta nam de.',
        'price.required' => 'The price field is required.',
        'image.required' => 'The image field is required.',
    ];
}
}
