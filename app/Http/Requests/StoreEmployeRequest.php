<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nom' => 'required|max:10',
            'prenom' => 'required|max:10',
            'lage' => 'required|integer|between:20,60',
            'n_cin' => 'required|max:10',
            'adresse' => 'required|max:50',
            'telephone' => 'required|max:20',
            'sexe' => 'required',
            'emploi' => 'required',
            'salaire' => 'required|integer',
            'role' => 'required',
        ];
    }
    public function messages(){
        return [
            'nom.max' => 'Le nom est supérieur à 10',
            'prenom.max' => 'Le prenom est supérieur à 10',
            'lage.between' => 'Lâge doit être compris entre 20 et 60 ans',
            'n_cin.regex' => 'Veuillez entrer un N° CIN valide',
            'adresse.max' => 'Le nom est supérieur à 50',
            'telephone.max' => 'sil vous plaît entrer un numéro de téléphone valide',
            'sexe.required' => 'Veuillez select type sexe',
            'emploi.required' => 'Veuillez select type emploi',
            'salaire.integer' => 'Le salaire est requis',
            'role.required' => 'Veuillez select type role',
        ];
    }
}

