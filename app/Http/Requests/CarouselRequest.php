<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
            'titre' => 'max:50',
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
            'titre.max' => 'Le titre de la photo ne doit pas dépasser 50 caractères',
            'photo.required' => 'Une photo doit être renseignée.',
            'photo.image' => 'Le fichier renseigné doit être une image.'
        ];
    }
}
