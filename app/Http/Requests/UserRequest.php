<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
     public const rules = [
        'email' => 'required|email|unique:users|max:100',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
        'nom' => 'required|max:50',
        'prenom' => 'required|max:50',
        'adresse' => 'required|max:150',
        'telFixe' => 'sometimes|nullable|digits:10',
        'telPortable' => 'sometimes|nullable|digits:10'
    ];
     
     public const messages = [
         'email.required' => 'Votre adresse email doit être renseignée.',
         'email.email' => 'Le format de votre adresse email est incorrect.',
         'email.max' => 'Votre email ne peut pas dépasser 100 caractères.',
         'email.unique' => 'L\'adresse mail saisie est déjà attribuée.',
         'password.required' => 'Le nouveau mot de passe doit être renseigné.',
         'password_confirmation.required' => 'Vous devez confirmer votre mot de passe.',
         'password_confirmation.same' => 'Les mots de passe saisis sont différents.',
         'nom.required' => 'Votre nom doit être renseigné.',
         'prenom.required' => 'Votre prénom doit être renseigné.',
         'nom.max' => 'Votre nom ne peut pas dépasser 50 caractères.',
         'prenom.max' => 'Votre prénom ne peut pas dépasser 50 caractères.',
         'adresse.required' => 'Votre adresse doit être renseignée.',
         'adresse.max' => 'Votre adresse ne peut pas dépasser 150 caractères.',
         'telFixe.digits' => 'Votre numéro de téléphone doit contenir 10 chiffres.',
         'telPortable.digits' => 'Votre numéro de téléphone doit contenir 10 chiffres.'
     ];
     
    
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
        return UserRequest::rules;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function getRules()
    {
        return UserRequest::rules;
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return UserRequest::messages;
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public static function getMessages()
    {
        return UserRequest::messages;
    }
}
