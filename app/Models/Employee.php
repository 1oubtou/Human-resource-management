<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [ 'nom', 'prenom', 'lage', 'n_cin', 'telephone', 'adresse', 'sexe', 'emploi', 'salaire','role' ];

    public function conge()
    {
        return $this->hasMany(Conge::class, 'employee_id');
    }
}
