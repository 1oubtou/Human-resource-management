<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCongeRequest;
use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongeController extends Controller
{
    public function index()
    {
        $conge_index = Conge::paginate(6);
        return view('conge.index' , compact('conge_index'));
    }
    
    public function create()
    {
        $employes = DB::table('employees')->select('id', 'nom', 'prenom')->get();
        return view('conge.creat', compact('employes'));
    }
    
    public function store(StoreCongeRequest $request)
    {
        Conge::create([
            'employee_id' =>$request->employee_id,
            'type' =>$request->type,
            'date_debut' =>$request->date_debut,
            'date_fin' =>$request->date_fin,
        ]);
        return redirect()->route('conge_index');
    }
    
    public function edit($id)
    {
        $conge_edit = Conge::find($id);
        $employes = DB::table('employees')->select('id', 'nom', 'prenom')->get();
        return view('conge.update', [
            'conge_edit' => $conge_edit,
            'employes' => $employes,
        ]);
    }
    
    public function update(StoreCongeRequest $request, $id)
    {
        $conge = Conge::find($id);

        $conge->employee_id = $request->employee_id;
        $conge->type = $request->type;
        $conge->date_debut = $request->date_debut;
        $conge->date_fin = $request->date_fin;

        $conge->save();
        
        return redirect()->route('conge_index');
    }
    
}
