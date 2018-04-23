<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
     public const rules = [
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
        'nom' => 'required|alpha',
        'prenom' => 'required|alpha',
        'telFixe' => 'sometimes|nullable|digits:10',
        'telPortable' => 'sometimes|nullable|digits:10'
    ];
     
     public const messages = [
         'email.required' => 'A title is required'
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
