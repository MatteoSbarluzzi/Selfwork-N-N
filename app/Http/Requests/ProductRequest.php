<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required | min:3',
            'description' => 'required',
            'price' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'price.required' => 'Il campo prezzo è obbligatorio',
        ];
    }
}
