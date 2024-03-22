<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use App\Models\dossiersMedicaux;
use PDF;


class RapportMedController extends Controller
{
    
    function index()
    {
        $data = dossiersMedicaux::join('patient', 'dossier_médicaux.patientID', '=', 'patient.id')
        ->join('rendez-vous', 'rendez-vous.patientID', '=', 'rendez-vous.id')
        ->select('patient.matricule', 'patient.nom', 'patient.poste','patient.service', 'dossier_médicaux.antécédents_médicaux', 'dossier_médicaux.allergies', 'dossier_médicaux.médicament', 'dossier_médicaux.maladie', 'dossier_médicaux.repos','dossier_médicaux.nbr_repos','rendez-vous.date_RDV')
            ->get();
        
        return view('layouts.rapportMed', compact('data'));
    } 
    function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $matricule = $request->get('matricule');
            $data=dossiersMedicaux::join('patient', 'dossier_médicaux.patientID', '=', 'patient.id')
        ->join('rendez-vous', 'rendez-vous.patientID', '=', 'rendez-vous.id')
        ->select('patient.matricule', 'patient.nom', 'patient.poste','patient.service', 'dossier_médicaux.antécédents_médicaux', 'dossier_médicaux.allergies', 'dossier_médicaux.médicament', 'dossier_médicaux.maladie', 'dossier_médicaux.repos','dossier_médicaux.nbr_repos','rendez-vous.date_RDV')
            ->where('matricule', 'like', '%' . $matricule . '%')
            ->get();
            return view('layouts.rapportMed', compact('data'));
        }
    return view('layouts.rapportMed',compact('data'));
}

public function download($matricule)
{
    $patient = patient::with('dossierMedicaux')->where('matricule', $matricule)->first();
  
    if (!$patient) {
        return redirect()->back()->with('error', 'Patient non trouvé.');
    }

    $dossierMedicaux = $patient->dossierMedicaux->first(); 

    $pdf = PDF::loadView('pdf.patient', compact('patient', 'dossierMedicaux'));
    return $pdf->download('patient.pdf');
}




}
