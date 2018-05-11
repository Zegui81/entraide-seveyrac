<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'titre' => 'required',
            'jourDebut' => 'required|date|before_or_equal:jourFin',
            'jourFin' => 'required|date',
            'organisateur' => 'required',
            'heureDebut' => 'required_without:journee',
            'heureFin' => 'required_without:journee',
            'photo' => 'image'
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
            'titre.required' => 'Le titre de l\'évènement doit être renseigné.',
            'jourDebut.required' => 'La date de commencement de l\'évènement doit être renseignée.',
            'jourFin.required' => 'La date de fin de l\'évènement doit être renseignée.',
            'organisateur.required' => 'L\'organisateur de l\'évènement doit être renseigné.',
            'heureDebut.required_without' => 'L\'heure de commencement de l\'évènement doit être renseignée.',
            'heureFin.required_without' => 'L\'heure de fin de l\'évènement doit être renseignée.',
            'jourDebut.before_or_equal' => 'La date de commencement de l\'évènement doit être avant la date de fin.',
            'photo.image' => 'Le fichier renseigné doit être une image.'
        ];
    }
}
