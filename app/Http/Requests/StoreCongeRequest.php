<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCongeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'employee_id' => 'required|integer',
            'type' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ];
    }
    public function messages(){
        return [
            'employee_id.integer' => 'Le employe est requis',
            'type.string' => 'Le type est requis',
            'date_debut.date' => 'le date de debut est requis',
            'date_fin.date' => 'le date dexpiration est requis',
            'date_fin.after' => 'La date de fin doit être après la date de début.',
        ];
    }
}