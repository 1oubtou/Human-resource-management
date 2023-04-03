<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Presence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::paginate(6);
        return view('presence.index' , compact('presences'));
    }
    
    public function create()
    {
        $conges = Conge::select('employee_id')->where('date_debut', '<=',  Carbon::today())->where('date_fin', '>=',  Carbon::today())->get();
        $presence = Presence::whereDate('created_at', Carbon::today())->get();
        $employes = DB::table('employees')->select('id', 'nom', 'prenom')->whereNotIn('id', $presence->pluck('employee_id'))->whereNotIn('id', $conges)->get();
        return view('presence.creat', compact('employes'));
    }
    
    public function store(Request $request)
    {
        $request->validate([ 'employee_id' => 'required|integer', 'statut' => 'required', ],
                           [ 'employee_id.integer' => 'Le employe est requis', 'statut.required' => 'Le statut est requis', ]);

        Presence::create([
            'employee_id' =>$request->employee_id,
            'statut' =>$request->statut,
        ]);
        return redirect()->route('presence_index');
    }

    // public function show($id)
    // {
    //     $presence = Presence::find($id);
    //     return view('presence.view' , compact('presence'));
    // }

    public function edit($id)
    {
        $presence_edit = Presence::find($id);
        $employes = DB::table('employees')->select('id', 'nom', 'prenom')->get();
        return view('presence.update', [
            'presence_edit' => $presence_edit,
            'employes' => $employes,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([ 'employee_id' => 'required|integer', 'statut' => 'required', ],
                           [ 'employee_id.integer' => 'Le employe est requis', 'statut.required' => 'Le statut est requis', ]);

        $presence = Presence::find($id);

        $presence->employee_id = $request->employee_id;
        $presence->statut = $request->statut;

        $presence->save();
        
        return redirect()->route('presence_index');
    }

}
