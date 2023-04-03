<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employee;
use App\Models\Presence;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function total()
    {
        $employes = Employee::count();
        $salaires = Employee::sum('salaire');
        $presence = Presence::where('statut', 'absent')->whereDate('created_at', Carbon::today())->count();
        $presences = Presence::where('statut', 'absent')->whereDate('created_at', Carbon::today())->paginate(4);
        $conges = Conge::select('employee_id')->where('date_debut', '<=',  Carbon::today())->where('date_fin', '>=',  Carbon::today())->count();
        

        return view('welcome', [
            'employes' => $employes,
            'presence' => $presence,
            'presences' => $presences,
            'salaires' => $salaires,
            'conges' => $conges,
        ]);
    }

}
