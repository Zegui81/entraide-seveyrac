<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CovoitRequest extends FormRequest
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
            'origine' => 'required|max:100',
            'destination' => 'required|max:100',
            'jourDepart' => 'required',
            'heureDepart' => 'required',
            'nbPlace' => 'required',
            'commentaire' => ''
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
            'origine.required' => 'Votre lieu de départ doit être renseigné.',
            'destination.required' => 'Votre lieu de destination doit être renseigné.',
            'jourDepart.required' => 'Le jour de votre départ doit être renseigné.',
            'heureDepart.required' => 'L\'heure de votre départ doit être renseignée.',
            'nbPlace.required' => 'Le nombre de places disponibles doit être renseigné.',
            'origine.max' => 'Votre lieu de départ ne peut pas dépasser 100 caractères.',
            'destination.max' => 'Votre lieu de destination ne peut pas dépasser 100 caractères.'
        ];
    }
}
