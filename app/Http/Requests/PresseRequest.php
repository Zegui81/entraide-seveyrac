<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required|max:100',
            'datePubli' => 'required|date',
            'description' => '',
            'photo' => 'required|image'
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titre.required' => 'Le titre de l\'article doit être renseigné.',
            'datePubli.required' => 'La date de publication de l\'article doit être renseignée.',
            'photo.required' => 'La photo de l\'article doit être renseignée.',
            'titre.max' => 'Le titre de l\'article ne doit pas dépasser 100 caractères.',
            'photo.image' => 'L\'article renseigné doit être une image.'
        ];
    }
}
