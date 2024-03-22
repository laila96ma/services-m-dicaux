<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use App\Models\dossiersMedicaux;

class dossierMedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dossierMedicaux=  dossiersMedicaux::all();
        return view ('layouts.dossierMedicaux')->with('dossierMedicaux', $dossierMedicaux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = patient::all();
        return view('layouts.createDM', compact('patients'));
       
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        $request->validate([
            'antécédents_médicaux' => 'required',
            'allergies' => 'required',
            'médicament' => 'required',
            'maladie' => 'required',
            'repos' => 'required',
        ]);
        $input = $request->all();
       
        if (!isset($input['patientID'])) {
            return redirect()->route('dossierMedicaux.create')->with('error', 'Sélectionnez un patient.');
        }

        $reposValue = $input['repos'] === 'oui' ? true : false;
        dossiersMedicaux::create([
            'antécédents_médicaux' => $input['antécédents_médicaux'],
            'allergies' => $input['allergies'],
            'médicament' => $input['médicament'],
            'maladie' => $input['maladie'],
            'analyse' => $input['analyse'],
            'repos' => $reposValue,
            'nbr_repos' => $input['nbr_repos'],
            'patientID' => $input['patientID']
        ]);

        return redirect()->route('dossierMedicaux.index')->with('flash_message', 'dossierMedicaux ajoutée avec succès!');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    
        $dossierMedicaux=  dossiersMedicaux::findOrFail($id);
        $patient = $dossierMedicaux->patient;

        return view('layouts.showDM', compact('dossierMedicaux', 'patient'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $dossierMedicaux = dossiersMedicaux::find($id);
        $patients = patient::all(); 
    
        return view('layouts.editDM', compact('dossierMedicaux', 'patients'));
    }
       
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dossierMedicaux =  dossiersMedicaux::find($id);

        $input = $request->all();
    
        
        if (!isset($input['patientID'])) {
            return redirect()->route('dossierMedicaux.edit', $id)->with('error', 'Sélectionnez une patient.');
        }
        $reposValue = $input['repos'] === 'oui' ? true : false;
        $dossierMedicaux->update([
            'antécédents_médicaux' => $input['antécédents_médicaux'],
            'allergies' => $input['allergies'],
            'médicament' => $input['médicament'],
            'maladie' => $input['maladie'],
            'analyse' => $input['analyse'],
            'repos' => $reposValue,
            'nbr_repos' => $input['nbr_repos'],
            'patientID' => $input['patientID']
        ]);
    
        return redirect()->route('dossierMedicaux.index')->with('flash_message', 'dossiers Medicaux mise à jour avec succès!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dossiersMedicaux::destroy($id);

        return redirect()->route('dossierMedicaux.index')->with('flash_message', ' dossiers Medicaux supprimée avec succès!');
    }
    function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $matricule = $request->get('matricule');
            $dossierMedicaux  = patient::join('dossier_médicaux', 'dossier_médicaux.patientID', '=', 'patient.id')
            ->select('patient.matricule', 'patient.nom', 'patient.poste', 'patient.service', 'dossier_médicaux.antécédents_médicaux', 'dossier_médicaux.allergies', 'dossier_médicaux.maladie', 'dossier_médicaux.médicament',
            'dossier_médicaux.maladie','dossier_médicaux.analyse','dossier_médicaux.nbr_repos')
            ->where('matricule', 'like', '%' . $matricule . '%')
            ->get();
            return view('layouts.searchDM', compact('dossierMedicaux'));

        }
    return view('layouts.searchDM',compact('dossierMedicaux'));
}
}
