<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id', 'type', 'date_debut', 'date_fin' ];

    
    public function employe()
    {
        return $this->belongsTo(Employee::class, 'employee_id' );
    }
}
