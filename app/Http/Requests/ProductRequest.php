<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'price.required' => 'Il campo prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero valido',
            'price.min' => 'Il prezzo non può essere negativo',
            'img.image' => 'Il file caricato deve essere un\'immagine',
            'img.mimes' => 'Formato immagine non valido (jpeg, png, jpg, gif)',
            'img.max' => 'L\'immagine non può superare 2MB di dimensione',
        ];
    }
}
