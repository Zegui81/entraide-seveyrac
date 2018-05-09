<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'adresse' => 'required',
            'telFixe' => 'sometimes|nullable|digits:10',
            'telPortable' => 'sometimes|nullable|digits:10'
        ];
    }
}
