<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email|max:100',
            'nom' => 'required|max:50',
            'prenom' => 'required|max:50',
            'message' => 'required'
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
            'email.required' => 'Votre adresse email doit être renseignée.',
            'nom.required' => 'Votre nom doit être renseigné.',
            'prenom.required' => 'Votre prénom doit être renseigné.',
            'message.required' => 'Une message doit être saisi pour l\'envoyer.',
            'email.email' => 'Le format de votre adresse email est incorrect.',
            'email.max' => 'Votre email ne peut pas dépasser 100 caractères.',
            'nom.max' => 'Votre nom ne peut pas dépasser 50 caractères.',
            'prenom.max' => 'Votre prénom ne peut pas dépasser 50 caractères.'
        ];
    }
}
