<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id', 'statut' ];
    
    public function employe()
    {
        return $this->belongsTo(Employee::class, 'employee_id' );
    }
    
}
