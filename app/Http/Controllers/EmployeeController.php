<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employes_index = Employee::paginate(6);
        return view('employe.index' , compact('employes_index'));
    }
    
    public function create()
    {
        return view('employe.creat');
    }
    
    public function store(StoreEmployeRequest $request)
    {
        Employee::create([
            'nom' =>$request->nom,
            'prenom' =>$request->prenom,
            'lage' =>$request->lage,
            'n_cin' =>$request->n_cin,
            'adresse' =>$request->adresse,
            'telephone' =>$request->telephone,
            'sexe' =>$request->sexe,
            'emploi' =>$request->emploi,
            'salaire' =>$request->salaire,
            'role' =>$request->role,
        ]);
        return redirect()->route('employe_index');
    }

    public function show($id)
    {
        $employe_show = Employee::find($id);
        return view('employe.view' , compact('employe_show'));
    }

    public function edit($id)
    {
        $employe_edit = Employee::find($id);
        return view('employe.update', compact('employe_edit'));
    }

    public function update(StoreEmployeRequest $request, $id)
    {
        $employe = Employee::find($id);

        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->lage = $request->lage;
        $employe->n_cin = $request->n_cin;
        $employe->adresse = $request->adresse;
        $employe->telephone = $request->telephone;
        $employe->sexe = $request->sexe;
        $employe->emploi = $request->emploi;
        $employe->salaire = $request->salaire;
        $employe->role = $request->role;

        $employe->save();
        
        return redirect()->route('employe_index');
    }
    
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employe_index');
    }
    
    public function salaires()
    {
        $employes_salaires = Employee::paginate(6);
        return view('employe.salaires' , compact('employes_salaires'));
    }

}
